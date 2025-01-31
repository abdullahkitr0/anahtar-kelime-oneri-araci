var hashMapResults = {},
    numOfKeywords = 0,
    doWork = false,
    keywordsToQuery = [],
    keywordsToQueryIndex = 0,
    queryflag = false;

function StartJob() {
    if (!doWork) {
        hashMapResults = {};
        numOfKeywords = 0;
        keywordsToQuery = [];
        keywordsToQueryIndex = 0;

        var inputKeywords = $("#inputKeywords").val().split("\n");
        inputKeywords.forEach(keyword => {
            keywordsToQuery.push(keyword);
            for (let j = 0; j < 26; j++) {
                let letter = String.fromCharCode(97 + j);
                let newKeyword = keyword + " " + letter;
                keywordsToQuery.push(newKeyword);
            }
        });

        doWork = true;
        $("#startjob").text("DURDUR");
        $("#status").text("Durum: İşlem Devam Ediyor...");
    } else {
        doWork = false;
        $("#startjob").text("BAŞLAT");
        $("#status").text("Durum: Durduruldu");
    }
}

function DoJob() {
    if (doWork && !queryflag) {
        if (keywordsToQueryIndex < keywordsToQuery.length) {
            QueryKeyword(keywordsToQuery[keywordsToQueryIndex]);
            keywordsToQueryIndex++;
        } else if (numOfKeywords !== 0) {
            doWork = false;
            $("#startjob").text("BAŞLAT");
            $("#status").text("Durum: Tamamlandı");
        } else {
            keywordsToQueryIndex = 0;
        }
    }
}

function QueryKeyword(keyword) {
    var engine = $("input[name='search-engine']:checked").attr("id"); // Yeni seçilen arama motoru
    queryflag = true;
    $("#status").text("Durum: Sorgulanıyor - " + keyword);

    $.ajax({
        url: "keyword_suggestions.php",
        data: { keyword: keyword, engine: engine },
        dataType: "json",
        success: function (response) {
            ProcessResponse(keyword, response.suggestions);
        },
        error: function () {
            $("#status").text("Durum: Hata oluştu");
        },
        complete: function () {
            queryflag = false;
        }
    });
}

function escapeHtml(text) {
  const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
  return text.replace(/[&<>"']/g, (m) => map[m]);
}

function ProcessResponse(keyword, suggestions) {
    var newKeywords = "";
    var suggestionList = "";

    suggestions.forEach(suggestion => {
        if (!hashMapResults[suggestion]) {
            hashMapResults[suggestion] = true;
            newKeywords += suggestion + "\r\n";
            suggestionList += `<span class="me-1">${escapeHtml(suggestion)} ,</span>`;
            numOfKeywords++;
        }
    });

    $("#input").val($("#input").val() + newKeywords);
    $("#numofkeywords").text(numOfKeywords);

    // Tabloya yeni satır ekleyin
    if (suggestionList) {
        $("#suggestionsTable").append(`
            <tr>
                <td>${keyword}</td>
                <td>${suggestionList}</td>
            </tr>
        `);
    }

    $("#status").text("Durum: İşlem Devam Ediyor...");
}

function saveTextAsFile() {
    var textToWrite = $("#input").val().replace(/</g, "&lt;").replace(/>/g, "&gt;"); // XSS koruması
    var textFileAsBlob = new Blob([textToWrite], { type: "text/plain" });
    var fileNameToSaveAs = "kelimeler.txt";
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
    downloadLink.click();
}

// Temizle butonu işlevi
$("#clear").click(function () {
    $("#inputKeywords").val("");  // Anahtar kelime inputunu temizle
    $("#input").val("");  // Çıktı textareasını temizle
    $("#numofkeywords").text("0");  // Kelime sayısını sıfırla
    $("#status").text("Durum: Bekliyor");  // Durum mesajını sıfırla
});

// Tabloyu temizleme işlevi, sadece tabloyu sıfırlayacak
$("#clearTable").click(function () {
    $("#suggestionsTable").empty();  // Tabloyu temizle, ama diğer alanları etkileme
});

$(document).ready(function () {
    $("#save").click(function () { saveTextAsFile(); });
    setInterval(DoJob, 750);
});

function saveCSVAsFile() {
    let csvContent = "data:text/csv;charset=utf-8,Sorgulanan Anahtar Kelime,Önerilen Anahtar Kelimeler\n";

    $("#suggestionsTable tr").each(function () {
        let row = $(this).find("td").map(function () {
            let cellText = $(this).text().replace(/,\s*$/, ""); // Son virgülü kaldır
            return `"${cellText.replace(/"/g, '""')}"`; // Tırnak içine al ve içteki tırnakları kaçır
        }).get().join(",");
        csvContent += row + "\n";
    });

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "anahtar_kelime_onerileri.csv");
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

$(document).ready(function () {
    $("#saveCSV").click(function () { saveCSVAsFile(); });
});


$(document).ajaxError(function(event, xhr, settings) {
    $("#status").text("Durum: Hata oluştu");
});



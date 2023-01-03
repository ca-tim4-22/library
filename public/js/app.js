var clicks_expand = 0;
$("#expand").click(function () {
    $("#expand").hide(), $("#expand2").toggleClass("show_expand"), $("#expand2").removeClass("hidden_expand"), ++clicks_expand;
});
var clicks_expand_2 = 0;
$("#expand2").click(function () {
    $("#expand").show(), $("#expand2").removeClass("show_expand"), $("#expand2").toggleClass("hidden_expand"), ++clicks_expand_2;
}),
    $("#gear").click(function () {
        $("#gear").toggleClass("rotate_gear");
    }),
    $("#gear_text").click(function () {
        $("#gear").toggleClass("rotate_gear_text");
    }),
    $("#bell").click(function () {
        $("#bell").toggleClass("scale_bell");
    }),
    $("#scale_link_ad").click(function () {
        $("#scale_link_ad").toggleClass("scale_link");
    }),
    $("#scale_link_l").click(function () {
        $("#scale_link_l").toggleClass("scale_link");
    }),
    $("#scale_link_s").click(function () {
        $("#scale_link_s").toggleClass("scale_link");
    }),
    $("#scale_link_b").click(function () {
        $("#scale_link_b").toggleClass("scale_link");
    }),
    $("#scale_link_au").click(function () {
        $("#scale_link_au").toggleClass("scale_link");
    }),
    $("#scale_link_profile").click(function () {
        $("#scale_link_profile").toggleClass("scale_link");
    }),
    $("#scale_link_logout").click(function () {
        $("#scale_link_logout").toggleClass("scale_link");
    });
var clicks_plus = 0;
$("#plus").click(function () {
    0 == clicks_plus ? $("#plus").toggleClass("rotate_plus") : $("#plus").toggleClass("rotate_plus_opposite"), ++clicks_plus;
});
var $fileInput = $(".file-input"),
    $droparea = $(".file-drop-area");
function AddReadMore() {
    var e = 1e3;
    $(".addReadMore").each(function () {
        if (!$(this).find(".firstSec").length) {
            var t = $(this).text();
            if (t.length > e) {
                var i =
                    t.substring(0, e) +
                    "<span class='SecSec'>" +
                    t.substring(e, t.length) +
                    "</span><span class='readMore'  title='Click to Show More'> ... Prikazi vise &#8681;</span><span class='readLess' title='Click to Show Less'> Prikazi manje &#8657;</span>";
                $(this).html(i);
            }
        }
    }),
        $(document).on("click", ".readMore,.readLess", function () {
            $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
        });
}
function dataFileDnD() {
    return {
        files: [],
        fileDragging: null,
        fileDropping: null,
        humanFileSize(e) {
            const t = Math.floor(Math.log(e) / Math.log(1024));
            return 1 * (e / Math.pow(1024, t)).toFixed(2) + " " + ["B", "kB", "MB", "GB", "TB"][t];
        },
        remove(e) {
            let t = [...this.files];
            t.splice(e, 1), (this.files = createFileList(t));
        },
        drop(e) {
            let t,
                i = [...this.files];
            (t = i.splice(this.fileDragging, 1)), i.splice(this.fileDropping, 0, ...t), (this.files = createFileList(i)), (this.fileDropping = null), (this.fileDragging = null);
        },
        dragenter(e) {
            let t = e.target.closest("[draggable]");
            this.fileDropping = t.getAttribute("data-index");
        },
        dragstart(e) {
            (this.fileDragging = e.target.closest("[draggable]").getAttribute("data-index")), (e.dataTransfer.effectAllowed = "move");
        },
        loadFile(e) {
            const t = document.querySelectorAll(".preview"),
                i = URL.createObjectURL(e);
            return (
                t.forEach((e) => {
                    e.onload = () => {
                        URL.revokeObjectURL(e.src);
                    };
                }),
                i
            );
        },
        addFiles(e) {
            const t = createFileList([...this.files], [...e.target.files]);
            (this.files = t), (this.form.formData.files = [...t]);
        },
    };
}
$fileInput.on("dragenter focus click", function () {
    $droparea.addClass("is-active");
}),
    $fileInput.on("dragleave blur drop", function () {
        $droparea.removeClass("is-active");
    }),
    $fileInput.on("change", function () {
        var e = $(this)[0].files.length,
            t = $(this).prev();
        if (1 === e) {
            var i = $(this).val().split("\\").pop();
            t.text(i);
        } else t.text(e + " prevučeno");
    }),
    $(function () {
        var e = $("#hamburger"),
            t = $(".sidebar");
        e.on("click", function () {
            t.hasClass("sidebar-active")
                ? (t.removeClass("sidebar-active"),
                  e.removeClass("fa-times"),
                  e.addClass("fa-bars"),
                  $(".sidebar-item").addClass("hidden"),
                  $(".sidebar-item").removeClass("inline"),
                  $(".aside-item").hide(),
                  $(".arrow").removeClass("fa-angle-up"),
                  $(".arrow").addClass("fa-angle-down"))
                : (t.addClass("sidebar-active"), e.addClass("fa-times"), e.removeClass("fa-bars"), $(".sidebar-item").removeClass("hidden"), $(".sidebar-item").addClass("inline"));
        });
    }),
    $(function () {
        $(".asideArrow").on("click", function () {
            var e = this.id.match(/\d+/)[0];
            $("#aside-item_" + e).slideToggle(),
                $("#arrow-collapse_" + e).hasClass("fa-angle-down")
                    ? ($("#arrow-collapse_" + e).addClass("fa-angle-up"), $("#arrow-collapse_" + e).removeClass("fa-angle-down"))
                    : ($("#arrow-collapse_" + e).addClass("fa-angle-down"), $("#arrow-collapse_" + e).removeClass("fa-angle-up"));
        });
    }),
    $(function () {
        $(".form-checkbox").click(function () {
            $(".form-checkbox:checked").length > 0 ? $(".disabled-btn").removeAttr("disabled") : $(".disabled-btn").attr("disabled", "disabled");
        });
    }),
    $(document).ready(function () {
        $(".activity-card").length > 6 && ($(".activity-card:gt(6)").hide(), $(".activity-showMore").show(), $(this).text("Prikaži više")),
            $(".activity-showMore").on("click", function () {
                $(".activity-card:gt(6)").toggle(), "Prikaži manje" == $(this).text() ? $(this).text("Prikaži više") : $(this).text("Prikaži manje");
            }),
            $(".forma").submit(function (e) {
                e.preventDefault();
            }),
            (modal = $(".modal")),
            $(".show-modal").on("click", function () {
                modal.removeClass("hidden");
            }),
            $(".close-modal").on("click", function () {
                modal.addClass("hidden");
            }),
            (vratiModal = $(".vrati-modal")),
            $(".show-vratiModal").on("click", function () {
                vratiModal.removeClass("hidden");
            }),
            $(".close-modal").on("click", function () {
                vratiModal.addClass("hidden");
            }),
            (otpisiModal = $(".otpisi-modal")),
            $(".show-otpisiModal").on("click", function () {
                otpisiModal.removeClass("hidden");
            }),
            $(".otpisi-modal").on("click", function () {
                otpisiModal.addClass("hidden");
            }),
            (izbrisiModal = $(".izbrisi-modal")),
            $(".show-izbrisiModal").on("click", function () {
                izbrisiModal.removeClass("hidden");
            }),
            $(".izbrisi-modal").on("click", function () {
                izbrisiModal.addClass("hidden");
            });
    }),
    $(function () {
        AddReadMore();
    });
var loadFileStudent = function (e) {
        var t = document.getElementById("image-output-student");
        (t.style.display = "block"), (t.src = URL.createObjectURL(e.target.files[0]));
    },
    loadFileLibrarian = function (e) {
        var t = document.getElementById("image-output-librarian");
        (t.style.display = "block"), (t.src = URL.createObjectURL(e.target.files[0]));
    };
function sortTable() {
    var e, t, i, a, r, n, o;
    for (e = document.getElementById("myTable"), i = !0; i; ) {
        for (i = !1, t = e.rows, a = 1; a < t.length - 1; a++)
            if (((o = !1), (r = t[a].getElementsByTagName("TD")[1]), (n = t[a + 1].getElementsByTagName("TD")[1]), 2 == r.children.length))
                if (1 == r.children[1].children.length) {
                    let [e, t] = [r.children[1].children[0], n.children[1].children[0]];
                    if (e.innerHTML.toLowerCase() > t.innerHTML.toLowerCase()) {
                        o = !0;
                        break;
                    }
                } else {
                    let [e, t] = [r.children[1], n.children[1]];
                    if (e.innerHTML.toLowerCase() > t.innerHTML.toLowerCase()) {
                        o = !0;
                        break;
                    }
                }
            else if (1 == r.children.length) {
                let [e, t] = [r.children[0], n.children[0]];
                if (e.innerHTML.toLowerCase() > t.innerHTML.toLowerCase()) {
                    o = !0;
                    break;
                }
            }
        o && (t[a].parentNode.insertBefore(t[a + 1], t[a]), (i = !0));
    }
}
$("#icon-upload").change(function () {
    $("#icon-output").text(this.files[0].name);
});
let rezervacije = $(".rezervacije");
function validacijaBibliotekar() {
    $("#validateNameBibliotekar").empty(), $("#validateJmbgBibliotekar").empty(), $("#validateEmailBibliotekar").empty(), $("#validateUsernameBibliotekar").empty(), $("#validatePwBibliotekar").empty(), $("#validatePw2Bibliotekar").empty();
    let e = $("#imePrezimeBibliotekar").val(),
        t = $("#jmbgBibliotekar").val(),
        i = $("#emailBibliotekar").val(),
        a = $("#usernameBibliotekar").val(),
        r = $("#pwBibliotekar").val(),
        n = $("#pw2Bibliotekar").val();
    0 == e.length && $("#validateNameBibliotekar").append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>'),
        0 == t.length && $("#validateJmbgBibliotekar").append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>'),
        0 == i.length && $("#validateEmailBibliotekar").append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>'),
        0 == a.length && $("#validateUsernameBibliotekar").append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>'),
        0 == r.length && $("#validatePwBibliotekar").append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>'),
        0 == n.length && $("#validatePw2Bibliotekar").append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
}
function clearErrorsNameBibliotekar() {
    $("#validateNameBibliotekar").empty();
}
function clearErrorsJmbgBibliotekar() {
    $("#validateJmbgBibliotekar").empty();
}
function clearErrorsEmailBibliotekar() {
    $("#validateEmailBibliotekar").empty();
}
function clearErrorsUsernameBibliotekar() {
    $("#validateUsernameBibliotekar").empty();
}
function clearErrorsPwBibliotekar() {
    $("#validatePwBibliotekar").empty();
}
function clearErrorsPw2Bibliotekar() {
    $("#validatePw2Bibliotekar").empty();
}
function validacijaBibliotekarEdit() {
    $("#validateNameBibliotekarEdit").empty(),
        $("#validateJmbgBibliotekarEdit").empty(),
        $("#validateEmailBibliotekarEdit").empty(),
        $("#validateUsernameBibliotekarEdit").empty(),
        $("#validatePwBibliotekarEdit").empty(),
        $("#validatePw2BibliotekarEdit").empty();
    let e = $("#imePrezimeBibliotekarEdit").val(),
        t = $("#jmbgBibliotekarEdit").val(),
        i = $("#emailBibliotekarEdit").val(),
        a = $("#usernameBibliotekarEdit").val(),
        r = $("#pwBibliotekarEdit").val(),
        n = $("#pw2BibliotekarEdit").val();
    0 == e.length && $("#validateNameBibliotekarEdit").append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>'),
        0 == t.length && $("#validateJmbgBibliotekarEdit").append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>'),
        0 == i.length && $("#validateEmailBibliotekarEdit").append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>'),
        0 == a.length && $("#validateUsernameBibliotekarEdit").append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>'),
        0 == r.length && $("#validatePwBibliotekarEdit").append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>'),
        0 == n.length && $("#validatePw2BibliotekarEdit").append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
}
function clearErrorsNameBibliotekarEdit() {
    $("#validateNameBibliotekarEdit").empty();
}
function clearErrorsJmbgBibliotekarEdit() {
    $("#validateJmbgBibliotekarEdit").empty();
}
function clearErrorsEmailBibliotekarEdit() {
    $("#validateEmailBibliotekarEdit").empty();
}
function clearErrorsUsernameBibliotekarEdit() {
    $("#validateUsernameBibliotekarEdit").empty();
}
function clearErrorsPwBibliotekarEdit() {
    $("#validatePwBibliotekarEdit").empty();
}
function clearErrorsPw2BibliotekarEdit() {
    $("#validatePw2BibliotekarEdit").empty();
}
function validacijaUcenik() {
    $("#validateNameUcenik").empty(), $("#validateJmbgUcenik").empty(), $("#validateEmailUcenik").empty(), $("#validateUsernameUcenik").empty(), $("#validatePwUcenik").empty(), $("#validatePw2Ucenik").empty();
    let e = $("#imePrezimeUcenik").val(),
        t = $("#jmbgUcenik").val(),
        i = $("#emailUcenik").val(),
        a = $("#usernameUcenik").val(),
        r = $("#pwUcenik").val(),
        n = $("#pw2Ucenik").val();
    0 == e.length && $("#validateNameUcenik").append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>'),
        0 == t.length && $("#validateJmbgUcenik").append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>'),
        0 == i.length && $("#validateEmailUcenik").append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>'),
        0 == a.length && $("#validateUsernameUcenik").append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>'),
        0 == r.length && $("#validatePwUcenik").append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>'),
        0 == n.length && $("#validatePw2Ucenik").append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
}
function clearErrorsNameUcenik() {
    $("#validateNameUcenik").empty();
}
function clearErrorsJmbgUcenik() {
    $("#validateJmbgUcenik").empty();
}
function clearErrorsEmailUcenik() {
    $("#validateEmailUcenik").empty();
}
function clearErrorsUsernameUcenik() {
    $("#validateUsernameUcenik").empty();
}
function clearErrorsPwUcenik() {
    $("#validatePwUcenik").empty();
}
function clearErrorsPw2Ucenik() {
    $("#validatePw2Ucenik").empty();
}
function validacijaUcenikEdit() {
    $("#validateNameUcenikEdit").empty(), $("#validateJmbgUcenikEdit").empty(), $("#validateEmailUcenikEdit").empty(), $("#validateUsernameUcenikEdit").empty(), $("#validatePwUcenikEdit").empty(), $("#validatePw2UcenikEdit").empty();
    let e = $("#imePrezimeUcenikEdit").val(),
        t = $("#jmbgUcenikEdit").val(),
        i = $("#emailUcenikEdit").val(),
        a = $("#usernameUcenikEdit").val(),
        r = $("#pwUcenikEdit").val(),
        n = $("#pw2UcenikEdit").val();
    0 == e.length && $("#validateNameUcenikEdit").append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>'),
        0 == t.length && $("#validateJmbgUcenikEdit").append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>'),
        0 == i.length && $("#validateEmailUcenikEdit").append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>'),
        0 == a.length && $("#validateUsernameUcenikEdit").append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>'),
        0 == r.length && $("#validatePwUcenikEdit").append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>'),
        0 == n.length && $("#validatePw2UcenikEdit").append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
}
function clearErrorsNameUcenikEdit() {
    $("#validateNameUcenikEdit").empty();
}
function clearErrorsJmbgUcenikEdit() {
    $("#validateJmbgUcenikEdit").empty();
}
function clearErrorsEmailUcenikEdit() {
    $("#validateEmailUcenikEdit").empty();
}
function clearErrorsUsernameUcenikEdit() {
    $("#validateUsernameUcenikEdit").empty();
}
function clearErrorsPwUcenikEdit() {
    $("#validatePwUcenikEdit").empty();
}
function clearErrorsPw2UcenikEdit() {
    $("#validatePw2UcenikEdit").empty();
}
function validacijaKnjiga() {
    $("#validateNazivKnjiga").empty(), $("#validateKategorija").empty(), $("#validateZanr").empty(), $("#validateAutori").empty(), $("#validateIzdavac").empty(), $("#validateGodinaIzdavanja").empty(), $("#validateKnjigaKolicina").empty();
    let e = $("#nazivKnjiga").val(),
        t = $("#kategorijaInput").val(),
        i = $("#zanroviInput").val(),
        a = $("#autoriInput").val(),
        r = $("#izdavac").val(),
        n = $("#godinaIzdavanja").val(),
        o = $("#knjigaKolicina").val();
    0 == e.length && $("#validateNazivKnjiga").append('<p style="color:red;font-size:13px;">Morate unijeti naziv knjige!</p>'),
        0 == t.length && $("#validateKategorija").append('<p style="color:red;font-size:13px;">Morate selektovati kategoriju!</p>'),
        0 == i.length && $("#validateZanr").append('<p style="color:red;font-size:13px;">Morate selektovati zanr!</p>'),
        0 == a.length && $("#validateAutori").append('<p style="color:red;font-size:13px;">Morate odabrati autore!</p>'),
        null == r && $("#validateIzdavac").append('<p style="color:red;font-size:13px;">Morate selektovati izdavaca!</p>'),
        null == n && $("#validateGodinaIzdavanja").append('<p style="color:red;font-size:13px;">Morate selektovati godinu izdavanja!</p>'),
        0 == o.length && $("#validateKnjigaKolicina").append('<p style="color:red;font-size:13px;">Morate unijeti kolicinu!</p>');
}
function clearErrorsNazivKnjiga() {
    $("#validateNazivKnjiga").empty();
}
function clearErrorsKategorija() {
    $("#validateKategorija").empty();
}
function clearErrorsZanr() {
    $("#validateZanr").empty();
}
function clearErrorsAutori() {
    $("#validateAutori").empty();
}
function clearErrorsIzdavac() {
    $("#validateIzdavac").empty();
}
function clearErrorsGodinaIzdavanja() {
    $("#validateGodinaIzdavanja").empty();
}
function clearErrorsKnjigaKolicina() {
    $("#validateKnjigaKolicina").empty();
}
function validacijaKnjigaEdit() {
    $("#validateNazivKnjigaEdit").empty(),
        $("#validateKategorijaEdit").empty(),
        $("#validateZanrEdit").empty(),
        $("#validateAutoriEdit").empty(),
        $("#validateIzdavacEdit").empty(),
        $("#validateGodinaIzdavanjaEdit").empty(),
        $("#validateKnjigaKolicinaEdit").empty();
    let e = $("#nazivKnjigaEdit").val(),
        t = $("#kategorijaInputEdit").val(),
        i = $("#zanroviInputEdit").val(),
        a = $("#autoriInputEdit").val(),
        r = $("#izdavacEdit").val(),
        n = $("#godinaIzdavanjaEdit").val(),
        o = $("#knjigaKolicinaEdit").val();
    0 == e.length && $("#validateNazivKnjigaEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv knjige!</p>'),
        0 == t.length && $("#validateKategorijaEdit").append('<p style="color:red;font-size:13px;">Morate selektovati kategoriju!</p>'),
        0 == i.length && $("#validateZanrEdit").append('<p style="color:red;font-size:13px;">Morate selektovati zanr!</p>'),
        0 == a.length && $("#validateAutoriEdit").append('<p style="color:red;font-size:13px;">Morate odabrati autore!</p>'),
        null == r && $("#validateIzdavacEdit").append('<p style="color:red;font-size:13px;">Morate selektovati izdavaca!</p>'),
        null == n && $("#validateGodinaIzdavanjaEdit").append('<p style="color:red;font-size:13px;">Morate selektovati godinu izdavanja!</p>'),
        0 == o.length && $("#validateKnjigaKolicinaEdit").append('<p style="color:red;font-size:13px;">Morate unijeti kolicinu!</p>');
}
function clearErrorsNazivKnjigaEdit() {
    $("#validateNazivKnjigaEdit").empty();
}
function clearErrorsKategorijaEdit() {
    $("#validateKategorijaEdit").empty();
}
function clearErrorsZanrEdit() {
    $("#validateZanrEdit").empty();
}
function clearErrorsAutoriEdit() {
    $("#validateAutoriEdit").empty();
}
function clearErrorsIzdavacEdit() {
    $("#validateIzdavacEdit").empty();
}
function clearErrorsGodinaIzdavanjaEdit() {
    $("#validateGodinaIzdavanjaEdit").empty();
}
function clearErrorsKnjigaKolicinaEdit() {
    $("#validateKnjigaKolicinaEdit").empty();
}
function validacijaSpecifikacija() {
    $("#validateBrStrana").empty(), $("#validatePismo").empty(), $("#validatePovez").empty(), $("#validateFormat").empty(), $("#validateIsbn").empty();
    let e = $("#brStrana").val(),
        t = $("#pismo").val(),
        i = $("#povez").val(),
        a = $("#format").val(),
        r = $("#isbn").val();
    0 == e.length && $("#validateBrStrana").append('<p style="color:red;font-size:13px;">Morate unijeti broj strana!</p>'),
        null == t && $("#validatePismo").append('<p style="color:red;font-size:13px;">Morate selektovati pismo!</p>'),
        null == i && $("#validatePovez").append('<p style="color:red;font-size:13px;">Morate selektovati povez!</p>'),
        null == a && $("#validateFormat").append('<p style="color:red;font-size:13px;">Morate selektovati format!</p>'),
        0 == r.length && $("#validateIsbn").append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
}
function clearErrorsBrStrana() {
    $("#validateBrStrana").empty();
}
function clearErrorsPismo() {
    $("#validatePismo").empty();
}
function clearErrorsPovez() {
    $("#validatePovez").empty();
}
function clearErrorsFormat() {
    $("#validateFormat").empty();
}
function clearErrorsIsbn() {
    $("#validateIsbn").empty();
}
function validacijaSpecifikacijaEdit() {
    $("#validateBrStranaEdit").empty(), $("#validatePismoEdit").empty(), $("#validatePovezEdit").empty(), $("#validateFormatEdit").empty(), $("#validateIsbnEdit").empty();
    let e = $("#brStranaEdit").val(),
        t = $("#pismoEdit").val(),
        i = $("#povezEdit").val(),
        a = $("#formatEdit").val(),
        r = $("#isbnEdit").val();
    0 == e.length && $("#validateBrStranaEdit").append('<p style="color:red;font-size:13px;">Morate unijeti broj strana!</p>'),
        null == t && $("#validatePismoEdit").append('<p style="color:red;font-size:13px;">Morate selektovati pismo!</p>'),
        null == i && $("#validatePovezEdit").append('<p style="color:red;font-size:13px;">Morate selektovati povez!</p>'),
        null == a && $("#validateFormatEdit").append('<p style="color:red;font-size:13px;">Morate selektovati format!</p>'),
        0 == r.length && $("#validateIsbnEdit").append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
}
function clearErrorsBrStranaEdit() {
    $("#validateBrStranaEdit").empty();
}
function clearErrorsPismoEdit() {
    $("#validatePismoEdit").empty();
}
function clearErrorsPovezEdit() {
    $("#validatePovezEdit").empty();
}
function clearErrorsFormatEdit() {
    $("#validateFormatEdit").empty();
}
function clearErrorsIsbnEdit() {
    $("#validateIsbnEdit").empty();
}
function validacijaIzdavanje() {
    $("#validateUcenikIzdavanje").empty(), $("#validateDatumIzdavanja").empty();
    let e = $("#ucenikIzdavanje").val(),
        t = $("#datumIzdavanja").val();
    null == e && $("#validateUcenikIzdavanje").append('<p style="color:red;font-size:13px;">Morate selektovati ucenika!</p>'),
        0 === t.length && $("#validateDatumIzdavanja").append('<p style="color:red;font-size:13px;">Morate selektovati datum izdavanja!</p>');
}
function clearErrorsUcenikIzdavanje() {
    $("#validateUcenikIzdavanje").empty();
}
function clearErrorsDatumIzdavanja() {
    $("#validateDatumIzdavanja").empty();
}
function validacijaRezervisanje() {
    $("#validateUcenikRezervisanje").empty(), $("#validateDatumRezervisanja").empty();
    let e = $("#ucenikRezervisanje").val(),
        t = $("#datumRezervisanja").val();
    null == e && $("#validateUcenikRezervisanje").append('<p style="color:red;font-size:13px;">Morate selektovati učenika!</p>'),
        0 == t.length && $("#validateDatumRezervisanja").append('<p style="color:red;font-size:13px;">Morate selektovati datum rezervisanja!</p>');
}
function clearErrorsUcenikRezervisanje() {
    $("#validateUcenikRezervisanje").empty();
}
function clearErrorsDatumRezervisanja() {
    $("#validateDatumRezervisanja").empty();
}
function validacijaKategorija() {
    $("#validateNazivKategorije").empty(), 0 == $("#nazivKategorije").val().length && $("#validateNazivKategorije").append('<p style="color:red;font-size:13px;">Morate unijeti naziv kategorije!</p>');
}
function clearErrorsNazivKategorije() {
    $("#validateNazivKategorije").empty();
}
function validacijaKategorijaEdit() {
    $("#validateNazivKategorijeEdit").empty(), 0 == $("#nazivKategorijeEdit").val().length && $("#validateNazivKategorijeEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv kategorije!</p>');
}
function clearErrorsNazivKategorijeEdit() {
    $("#validateNazivKategorijeEdit").empty();
}
function validacijaAutor() {
    $("#validateImePrezimeAutor").empty(), 0 == $("#imePrezimeAutor").val().length && $("#validateImePrezimeAutor").append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime autora!</p>');
}
function clearErrorsImePrezimeAutor() {
    $("#validateImePrezimeAutor").empty();
}
function validacijaAutorEdit() {
    $("#validateImePrezimeAutorEdit").empty(), 0 == $("#imePrezimeAutorEdit").val().length && $("#validateImePrezimeAutorEdit").append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime autora!</p>');
}
function clearErrorsImePrezimeAutorEdit() {
    $("#validateImePrezimeAutorEdit").empty();
}
function validacijaZanr() {
    $("#validateNazivZanra").empty(), 0 == $("#nazivZanra").val().length && $("#validateNazivZanra").append('<p style="color:red;font-size:13px;">Morate unijeti naziv zanra!</p>');
}
function clearErrorsNazivZanra() {
    $("#validateNazivZanra").empty();
}
function validacijaZanrEdit() {
    $("#validateNazivZanraEdit").empty(), 0 == $("#nazivZanraEdit").val().length && $("#validateNazivZanraEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv zanra!</p>');
}
function clearErrorsNazivZanraEdit() {
    $("#validateNazivZanraEdit").empty();
}
function validacijaIzdavac() {
    $("#validateNazivIzdavac").empty(), 0 == $("#nazivIzdavac").val().length && $("#validateNazivIzdavac").append('<p style="color:red;font-size:13px;">Morate unijeti naziv izdavaca!</p>');
}
function clearErrorsNazivIzdavac() {
    $("#validateNazivIzdavac").empty();
}
function validacijaIzdavacEdit() {
    $("#validateNazivIzdavacEdit").empty(), 0 == $("#nazivIzdavacEdit").val().length && $("#validateNazivIzdavacEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv izdavaca!</p>');
}
function clearErrorsNazivIzdavacEdit() {
    $("#validateNazivIzdavacEdit").empty();
}
function validacijaPovez() {
    $("#validateNazivPovez").empty(), 0 == $("#nazivPovez").val().length && $("#validateNazivPovez").append('<p style="color:red;font-size:13px;">Morate unijeti naziv poveza!</p>');
}
function clearErrorsNazivPovez() {
    $("#validateNazivPovez").empty();
}
function validacijaPovezEdit() {
    $("#validateNazivPovezEdit").empty(), 0 == $("#nazivPovezEdit").val().length && $("#validateNazivPovezEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv poveza!</p>');
}
function clearErrorsNazivPovezEdit() {
    $("#validateNazivPovezEdit").empty();
}
function validacijaFormat() {
    $("#validateNazivFormat").empty(), 0 == $("#nazivFormat").val().length && $("#validateNazivFormat").append('<p style="color:red;font-size:13px;">Morate unijeti naziv formata!</p>');
}
function clearErrorsNazivFormat() {
    $("#validateNazivFormat").empty();
}
function validacijaFormatEdit() {
    $("#validateNazivFormatEdit").empty(), 0 == $("#nazivFormatEdit").val().length && $("#validateNazivFormatEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv formata!</p>');
}
function clearErrorsNazivFormatEdit() {
    $("#validateNazivFormatEdit").empty();
}
function validacijaPismo() {
    $("#validateNazivPismo").empty(), 0 == $("#nazivPismo").val().length && $("#validateNazivPismo").append('<p style="color:red;font-size:13px;">Morate unijeti naziv pisma!</p>');
}
function clearErrorsNazivPismo() {
    $("#validateNazivPismo").empty();
}
function validacijaPismoEdit() {
    $("#validateNazivPismoEdit").empty(), 0 == $("#nazivPismoEdit").val().length && $("#validateNazivPismoEdit").append('<p style="color:red;font-size:13px;">Morate unijeti naziv pisma!</p>');
}
function clearErrorsNazivPismoEdit() {
    $("#validateNazivPismoEdit").empty();
}
function validacijaSifraUcenik() {
    $("#validatePwResetUcenik").empty(), $("#validatePw2ResetUcenik").empty();
    let e = $("#pwResetUcenik").val(),
        t = $("#pw2ResetUcenik").val();
    0 == e.length && $("#validatePwResetUcenik").append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>'),
        0 == t.length && $("#validatePw2ResetUcenik").append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
}
function clearErrorsPwResetUcenik() {
    $("#validatePwResetUcenik").empty();
}
function clearErrorsPw2ResetUcenik() {
    $("#validatePw2ResetUcenik").empty();
}
function validacijaSifraBibliotekar() {
    $("#validatePwResetBibliotekar").empty(), $("#validatePw2ResetBibliotekar").empty();
    let e = $("#pwResetBibliotekar").val(),
        t = $("#pw2ResetBibliotekar").val();
    0 == e.length && $("#validatePwResetBibliotekar").append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>'),
        0 == t.length && $("#validatePw2ResetBibliotekar").append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
}
function clearErrorsPwResetBibliotekar() {
    $("#validatePwResetBibliotekar").empty();
}
function clearErrorsPw2ResetBibliotekar() {
    $("#validatePw2ResetBibliotekar").empty();
}
function sortTableDate(e) {
    var t, i, a, r, n, o, l;
    for (t = $(".sortTableDate"), a = !0; a; ) {
        for (a = !1, i = t[0].rows, r = 1; r < i.length - 1; r++) {
            (l = !1), (n = i[r].getElementsByTagName("TD")[e]), (o = i[r + 1].getElementsByTagName("TD")[e]);
            let t = $(n).text().split("."),
                [a, s, c] = [parseInt(t[0]), parseInt(t[1]), parseInt(t[2])],
                d = $(o).text().split("."),
                [p, u, v] = [parseInt(d[0]), parseInt(d[1]), parseInt(d[2])];
            if (c > v) {
                l = !0;
                break;
            }
            if (c == v && s > u) {
                l = !0;
                break;
            }
            if (c == v && s == u && a > p) {
                l = !0;
                break;
            }
        }
        l && (i[r].parentNode.insertBefore(i[r + 1], i[r]), (a = !0));
    }
}
function filterFunction(e, t, i) {
    var a, r, n;
    for (console.log(e), console.log(t), a = document.getElementById(e).value.toUpperCase(), div = document.getElementById(t), r = document.getElementsByClassName(i), text = div.getElementsByTagName("p"), n = 0; n < text.length; n++)
        (txtValue = text[n].textContent || text[n].innerText), txtValue.toUpperCase().indexOf(a) > -1 ? (r[n].style.display = "") : (r[n].style.display = "none");
}
function dropdown() {
    return {
        options: [],
        selected: [],
        show: !1,
        open() {
            this.show = !0;
        },
        close() {
            this.show = !1;
        },
        isOpen() {
            return !0 === this.show;
        },
        select(e, t) {
            this.options[e].selected ? (this.selected.splice(this.selected.lastIndexOf(e), 1), (this.options[e].selected = !1)) : ((this.options[e].selected = !0), (this.options[e].element = t.target), this.selected.push(e));
        },
        remove(e, t) {
            (this.options[t].selected = !1), this.selected.splice(e, 1);
        },
        loadOptions() {
            const e = document.getElementById("kategorija").options;
            for (let t = 0; t < e.length; t++) this.options.push({ value: e[t].value, text: e[t].innerText, selected: null != e[t].getAttribute("selected") && e[t].getAttribute("selected") });
        },
        loadOptionsEdit() {
            for (let e = 0; e < options.length; e++) this.options.push({ value: options[e].value, text: options[e].innerText, selected: null != options[e].getAttribute("selected") && options[e].getAttribute("selected") });
        },
        loadOptionsZanrovi() {
            const e = document.getElementById("zanr").options;
            for (let t = 0; t < e.length; t++) this.options.push({ value: e[t].value, text: e[t].innerText, selected: null != e[t].getAttribute("selected") && e[t].getAttribute("selected") });
        },
        loadOptionsZanroviEdit() {
            const e = document.getElementById("zanrEdit").options;
            for (let t = 0; t < e.length; t++) this.options.push({ value: e[t].value, text: e[t].innerText, selected: null != e[t].getAttribute("selected") && e[t].getAttribute("selected") });
        },
        loadOptionsAutori() {
            const e = document.getElementById("autori").options;
            for (let t = 0; t < e.length; t++) this.options.push({ value: e[t].value, text: e[t].innerText, selected: null != e[t].getAttribute("selected") && e[t].getAttribute("selected") });
        },
        loadOptionsAutoriEdit() {
            const e = document.getElementById("autoriEdit").options;
            for (let t = 0; t < e.length; t++) this.options.push({ value: e[t].value, text: e[t].innerText, selected: null != e[t].getAttribute("selected") && e[t].getAttribute("selected") });
        },
        selectedValues() {
            return this.selected.map((e) => this.options[e].value);
        },
        selectedValuesKategorijaEdit: () => document.getElementById("kategorijaEdit").options[1].innerText,
        selectedValuesZanrEdit: () => document.getElementById("zanrEdit").options[2].innerText,
        selectedValuesAutoriEdit: () => document.getElementById("autoriEdit").options[0].innerText,
    };
}
rezervacije.on("click", (e) => {
    e.target.classList.contains("reservedStatus") &&
        (e.target.closest(".changeStatus").classList.add("hidden"),
        e.target.closest(".changeStatus").nextElementSibling.classList.remove("hidden"),
        e.target.closest(".changeStatus").nextElementSibling.nextElementSibling.nextElementSibling.children[0].classList.remove("hidden"),
        e.target.closest(".changeBg").classList.remove("bg-gray-200")),
        e.target.classList.contains("deniedStatus") &&
            (e.target.closest(".changeStatus").classList.add("hidden"),
            e.target.closest(".changeStatus").nextElementSibling.nextElementSibling.classList.remove("hidden"),
            e.target.closest(".changeStatus").nextElementSibling.nextElementSibling.nextElementSibling.children[0].classList.remove("hidden"),
            e.target.closest(".changeBg").classList.remove("bg-gray-200"));
}),
    $(".reservedBook").click(function () {
        var e = $(this),
            t = e.closest("tr").find(".borderColor"),
            i = e.closest("tr").find(".borderText");
        t.removeClass("border-yellow-500"),
            t.removeClass("bg-transparent"),
            t.addClass("bg-yellow-200"),
            i.text("Potvrdjene rezervacije"),
            i.removeClass("text-yellow-500"),
            i.addClass("text-yellow-700"),
            e.parent().addClass("hidden"),
            e.parent().next().removeClass("hidden"),
            e.closest("tr").removeClass("bg-gray-200");
    }),
    $(".deniedBook").click(function () {
        var e = $(this),
            t = e.closest("tr").find(".borderColor"),
            i = e.closest("tr").find(".borderText");
        t.removeClass("border-yellow-500"),
            t.removeClass("bg-transparent"),
            t.addClass("bg-red-200"),
            i.text("Odbijene rezervacije"),
            i.removeClass("text-yellow-500"),
            i.addClass("text-red-800"),
            e.parent().addClass("hidden"),
            e.parent().next().removeClass("hidden"),
            e.closest("tr").removeClass("bg-gray-200");
    }),
    $("#sacuvajBibliotekara").keypress(function (e) {
        if (13 == e.which) return validacijaBibliotekar(), !1;
    }),
    $("#sacuvajBibliotekaraEdit").keypress(function (e) {
        if (13 == e.which) return validacijaBibliotekarEdit(), !1;
    }),
    $("#sacuvajUcenika").keypress(function (e) {
        if (13 == e.which) return validacijaUcenik(), !1;
    }),
    $("#sacuvajUcenikaEdit").keypress(function (e) {
        if (13 == e.which) return validacijaUcenikEdit(), !1;
    }),
    $("#sacuvajKnjigu").keypress(function (e) {
        if (13 == e.which) return validacijaKnjiga(), !1;
    }),
    $("#sacuvajKnjiguEdit").keypress(function (e) {
        if (13 == e.which) return validacijaKnjigaEdit(), !1;
    }),
    $("#sacuvajSpecifikaciju").keypress(function (e) {
        if (13 == e.which) return validacijaSpecifikacija(), !1;
    }),
    $("#sacuvajSpecifikacijuEdit").keypress(function (e) {
        if (13 == e.which) return validacijaSpecifikacijaEdit(), !1;
    }),
    $("#izdajKnjigu").keypress(function (e) {
        if (13 == e.which) return validacijaIzdavanje(), !1;
    }),
    $("#rezervisiKnjigu").keypress(function (e) {
        if (13 == e.which) return validacijaRezervisanje(), !1;
    }),
    $("#sacuvajKategoriju").keypress(function (e) {
        if (13 == e.which) return validacijaKategorija(), !1;
    }),
    $("#sacuvajKategorijuEdit").keypress(function (e) {
        if (13 == e.which) return validacijaKategorijaEdit(), !1;
    }),
    $("#sacuvajAutora").keypress(function (e) {
        if (13 == e.which) return validacijaAutor(), !1;
    }),
    $("#sacuvajAutoraEdit").keypress(function (e) {
        if (13 == e.which) return validacijaAutorEdit(), !1;
    }),
    $("#sacuvajZanr").keypress(function (e) {
        if (13 == e.which) return validacijaZanr(), !1;
    }),
    $("#sacuvajZanrEdit").keypress(function (e) {
        if (13 == e.which) return validacijaZanrEdit(), !1;
    }),
    $("#sacuvajIzdavac").keypress(function (e) {
        if (13 == e.which) return validacijaIzdavac(), !1;
    }),
    $("#sacuvajIzdavacEdit").keypress(function (e) {
        if (13 == e.which) return validacijaIzdavacEdit(), !1;
    }),
    $("#sacuvajPovez").keypress(function (e) {
        if (13 == e.which) return validacijaPovez(), !1;
    }),
    $("#sacuvajPovezEdit").keypress(function (e) {
        if (13 == e.which) return validacijaPovezEdit(), !1;
    }),
    $("#sacuvajFormat").keypress(function (e) {
        if (13 == e.which) return validacijaFormat(), !1;
    }),
    $("#sacuvajFormatEdit").keypress(function (e) {
        if (13 == e.which) return validacijaFormatEdit(), !1;
    }),
    $("#sacuvajPismo").keypress(function (e) {
        if (13 == e.which) return validacijaPismo(), !1;
    }),
    $("#sacuvajPismoEdit").keypress(function (e) {
        if (13 == e.which) return validacijaPismoEdit(), !1;
    }),
    $("#resetujSifruUcenik").keypress(function (e) {
        if (13 == e.which) return validacijaSifraUcenik(), !1;
    }),
    $("#resetujSifruBibliotekar").keypress(function (e) {
        if (13 == e.which) return validacijaSifraBibliotekar(), !1;
    }),
    $("#autoriMenu").on("click", function () {
        $(".autoriMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".autoriMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".autoriMenu") || t.slideUp();
    }),
    $("#kategorijeMenu").on("click", function () {
        $(".kategorijeMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".kategorijeMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".kategorijeMenu") || t.slideUp();
    }),
    $(".uceniciDrop-toggle").on("click", function () {
        $(".uceniciMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".uceniciMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".uceniciMenu") || t.slideUp();
    }),
    $(".bibliotekariDrop-toggle").on("click", function () {
        $(".bibliotekariMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".bibliotekariMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".bibliotekariMenu") || t.slideUp();
    }),
    $("#knjigeMenu").on("click", function () {
        $(".knjigeMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".knjigeMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".knjigeMenu") || t.slideUp();
    }),
    $("#transakcijeMenu").on("click", function () {
        $(".transakcijeMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".transakcijeMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".transakcijeMenu") || t.slideUp();
    }),
    $(".datumDrop-toggle").on("click", function () {
        $(".datumMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".datumMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".datumMenu") || t.slideUp();
    }),
    $(".zadrzavanjeDrop-toggle").on("click", function () {
        $(".zadrzavanjeMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".zadrzavanjeMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".zadrzavanjeMenu") || t.slideUp();
    }),
    $(".vracanjeDrop-toggle").on("click", function () {
        $(".vracanjeMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".vracanjeMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".vracanjeMenu") || t.slideUp();
    }),
    $(".statusDrop-toggle").on("click", function () {
        $(".statusMenu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".statusMenu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".statusMenu") || t.slideUp();
    }),
    $(".select-all").click(function () {
        $(this).is(":checked") ? ($(".form-checkbox").prop("checked", !0), $("tr").addClass("bg-gray-200")) : ($(".form-checkbox").prop("checked", !1), $("tr").removeClass("bg-gray-200"));
    }),
    $(".form-checkbox").click(function () {
        $(this).is(":checked") ? $(this).closest("tr").addClass("bg-gray-200") : $(this).closest("tr").removeClass("bg-gray-200");
    }),
    $("#hide-image1").click(function () {
        $(".hiddenImage1").hide();
    }),
    $("#hide-image2").click(function () {
        $(".hiddenImage2").hide();
    }),
    $("#dropdownCreate").click(function () {
        $(".dropdown-create").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-create");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dropdownCreate") || t.slideUp();
    }),
    $("#dropdownProfile").click(function () {
        $(".dropdown-profile").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-profile");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dropdownProfile") || t.slideUp();
    }),
    $(".dotsCategory").click(function () {
        $(this).closest("td").find(".dropdown-category").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-category");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsGenre").click(function () {
        $(this).closest("td").find(".dropdown-genre").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-genre");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsPublisher").click(function () {
        $(this).closest("td").find(".dropdown-publisher").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-publisher");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsBookBind").click(function () {
        $(this).closest("td").find(".dropdown-book-bind").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-book-bind");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsFormat").click(function () {
        $(this).closest("td").find(".dropdown-format").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-format");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsScript").click(function () {
        $(this).closest("td").find(".dropdown-script").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-script");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsLibrarian").click(function () {
        $(this).closest("td").find(".dropdown-librarian").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-librarian");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsStudent").click(function () {
        $(this).closest("td").find(".dropdown-student").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-student");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsStudentProfile").click(function () {
        $(".dropdown-student-profile").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-student-profile");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsStudentProfile") || t.slideUp();
    }),
    $(".dotsStudentProfileEvidencija").click(function () {
        $(".dropdown-student-profile-evidencija").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-student-profile-evidencija");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsStudentProfileEvidencija") || t.slideUp();
    }),
    $(".dotsUcenikVraceneKnjige").click(function () {
        $(".ucenik-vracene-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-vracene-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsUcenikVraceneKnjige") || t.slideUp();
    }),
    $(".dotsUcenikKnjigePrekoracenje").click(function () {
        $(".ucenik-prekoracenje-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-prekoracenje-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsUcenikKnjigePrekoracenje") || t.slideUp();
    }),
    $(".dotsUcenikKnjigeAktivne").click(function () {
        $(".ucenik-aktivne-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-aktivne-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsUcenikKnjigeAktivne") || t.slideUp();
    }),
    $(".dotsUcenikKnjigeArhivirane").click(function () {
        $(".ucenik-arhivirane-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-arhivirane-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsUcenikKnjigeArhivirane") || t.slideUp();
    }),
    $(".dotsStudentProfileBookRecord").click(function () {
        $(this).closest("td").find(".dropdown-student-profile-evidencija-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-student-profile-evidencija-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsUcenikVraceneKnjigeTabela").click(function () {
        $(this).closest("td").find(".ucenik-vracene-knjige-tabela").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-vracene-knjige-tabela");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsUcenikPrekoracenjeKnjige").click(function () {
        $(this).closest("td").find(".ucenik-prekoracenje-knjige-tabela").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-prekoracenje-knjige-tabela");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsUcenikAktivneKnjige").click(function () {
        $(this).closest("td").find(".ucenik-aktivne-knjige-tabela").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-aktivne-knjige-tabela");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsUcenikArhiviraneKnjige").click(function () {
        $(this).closest("td").find(".ucenik-arhivirane-knjige-tabela").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".ucenik-arhivirane-knjige-tabela");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsLibrarianProfile").click(function () {
        $(".dropdown-librarian-profile").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-librarian-profile");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsLibrarianProfile") || t.slideUp();
    }),
    $(".dotsIzdateKnjige").click(function () {
        $(this).closest("td").find(".izdate-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".izdate-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsVraceneKnjige").click(function () {
        $(this).closest("td").find(".vracene-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".vracene-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsKnjigePrekoracenje").click(function () {
        $(this).closest("td").find(".knjige-prekoracenje").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".knjige-prekoracenje");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsAktivneRezervacije").click(function () {
        $(this).closest("td").find(".aktivne-rezervacije").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".aktivne-rezervacije");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsArhiviraneRezervacije").click(function () {
        $(this).closest("td").find(".arhivirane-rezervacije").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".arhivirane-rezervacije");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsAutori").click(function () {
        $(this).closest("td").find(".dropdown-autori").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-autori");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsAutor").click(function () {
        $(".dropdown-autor").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-autor");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsAutor") || t.slideUp();
    }),
    $(".dotsKnjige").click(function () {
        $(this).closest("td").find(".dropdown-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsKnjigaOsnovniDetalji").click(function () {
        $(".dropdown-knjiga-osnovni-detalji").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-knjiga-osnovni-detalji");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsKnjigaOsnovniDetalji") || t.slideUp();
    }),
    $(".dotsIzdajKnjigu").click(function () {
        $(".dropdown-izdaj-knjigu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-izdaj-knjigu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIzdajKnjigu") || t.slideUp();
    }),
    $(".dotsIzdajKnjiguError").click(function () {
        $(".dropdown-izdaj-knjigu-error").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-izdaj-knjigu-error");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIzdajKnjiguError") || t.slideUp();
    }),
    $(".dotsVratiKnjigu").click(function () {
        $(".dropdown-vrati-knjigu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-vrati-knjigu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsVratiKnjigu") || t.slideUp();
    }),
    $(".dotsRezervisiKnjigu").click(function () {
        $(".dropdown-rezervisi-knjigu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-rezervisi-knjigu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsRezervisiKnjigu") || t.slideUp();
    }),
    $(".dotsOtpisiKnjigu").click(function () {
        $(".dropdown-otpisi-knjigu").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-otpisi-knjigu");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsOtpisiKnjigu") || t.slideUp();
    }),
    $(".dotsKnjigaSpecifikacija").click(function () {
        $(".dropdown-knjiga-specifikacija").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-knjiga-specifikacija");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsKnjigaSpecifikacija") || t.slideUp();
    }),
    $(".dotsKnjigaMultimedija").click(function () {
        $(".dropdown-knjiga-multimedija").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-knjiga-multimedija");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsKnjigaMultimedija") || t.slideUp();
    }),
    $(".dotsIznajmljivanjeIzdate").click(function () {
        $(".dropdown-iznajmljivanje-izdate").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-iznajmljivanje-izdate");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIznajmljivanjeIzdate") || t.slideUp();
    }),
    $(".dotsIznajmljivanjeVracene").click(function () {
        $(".dropdown-iznajmljivanje-vracene").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-iznajmljivanje-vracene");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIznajmljivanjeVracene") || t.slideUp();
    }),
    $(".dotsIznajmljivanjePrekoracenje").click(function () {
        $(".dropdown-iznajmljivanje-prekoracenje").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-iznajmljivanje-prekoracenje");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIznajmljivanjePrekoracenje") || t.slideUp();
    }),
    $(".dotsIznajmljivanjeAktivneRezervacije").click(function () {
        $(".dropdown-iznajmljivanje-aktivne-rezervacije").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-iznajmljivanje-aktivne-rezervacije");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIznajmljivanjeAktivneRezervacije") || t.slideUp();
    }),
    $(".dotsIznajmljivanjeArhiviraneRezervacije").click(function () {
        $(".dropdown-iznajmljivanje-arhivirane-rezervacije").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-iznajmljivanje-arhivirane-rezervacije");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIznajmljivanjeArhiviraneRezervacije") || t.slideUp();
    }),
    $(".dotsIzdavanjeDetalji").click(function () {
        $(".dropdown-izdavanje-detalji").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".dropdown-izdavanje-detalji");
        t.is(e.target) || 0 !== t.has(e.target).length || $(e.target).is(".dotsIzdavanjeDetalji") || t.slideUp();
    }),
    $(".dotsIznajmljivanjeIzdateKnjige").click(function () {
        $(this).closest("td").find(".iznajmljivanje-izdate-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".iznajmljivanje-izdate-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsIznajmljivanjeVraceneKnjige").click(function () {
        $(this).closest("td").find(".iznajmljivanje-vracene-knjige").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".iznajmljivanje-vracene-knjige");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsIznajmljivanjeKnjigePrekoracenje").click(function () {
        $(this).closest("td").find(".iznajmljivanje-knjige-prekoracenje").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".iznajmljivanje-knjige-prekoracenje");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsIznajmljivanjeAktivneRezervacijeTabela").click(function () {
        $(this).closest("td").find(".iznajmljivanje-aktivne-rezervacije").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".iznajmljivanje-aktivne-rezervacije");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".dotsIznajmljivanjeArhiviraneRezervacijeTabela").click(function () {
        $(this).closest("td").find(".iznajmljivanje-arhivirane-rezervacije").toggle();
    }),
    $(document).on("mouseup", function (e) {
        var t = $(".iznajmljivanje-arhivirane-rezervacije");
        t.is(e.target) || 0 !== t.has(e.target).length || t.slideUp();
    }),
    $(".checkAll").click(function () {
        $(this).is(":checked")
            ? ($(".form-checkbox").prop("checked", !0),
              $("tr").addClass("bg-gray-200"),
              $("tr").children().eq(1).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fa fa-trash ml-4"></i>  Izbrisi knjigu</a>'),
              $("tr").children().eq(2).html(""),
              $("tr").children().eq(3).html(""),
              $("tr").children().eq(4).html(""),
              $("tr").children().eq(5).html(""),
              $("tr").children().eq(6).html(""),
              $("tr").children().eq(7).html(""),
              $("tr").children().eq(8).html(""))
            : ($(".form-checkbox").prop("checked", !1),
              $("tr").removeClass("bg-gray-200"),
              $("tr").children().eq(1).html('Naziv knjige<a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>'),
              $("tr")
                  .children()
                  .eq(2)
                  .html(
                      'Autor<i class="ml-2 fas fa-filter"></i><div id="autoriDropdown" class="autoriMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset"><li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"><input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search" onkeyup="filterFunction(" searchAutori ", "autoriDropdown ")" id="searchAutori"><br> <button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900"><i class="fas fa-search"></i></button></li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 2 </p>  </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg>  </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 3  </p> </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic 4  </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /></svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 5 </p> </li><li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"><input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 6 </p> </li> </div></ul><div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">  Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a> <a href="#"  class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]"> Ponisti <i class="fas fa-times ml-[4px]"></i> </a> </div></div>'
                  ),
              $("tr")
                  .children()
                  .eq(3)
                  .html(
                      'Kategorija<i class="ml-2 fas fa-filter"></i><div id="kategorijeDropdown" class="kategorijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset">  <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"> <input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search"  onkeyup="filterFunction("searchKategorije", "kategorijeDropdown")"  id="searchKategorije"><br><button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">  <i class="fas fa-search"></i> </button> </li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />   </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romani </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Udzbenici </p></li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Drame </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg>  </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Naucna fantastika </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romedije  </p>  </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"   viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Trileri </p> </li> </div> </ul> <div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]"> Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a>  <a href="#" class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">  Ponisti <i class="fas fa-times ml-[4px]"></i> </a></div></div>'
                  ),
              $("tr").children().eq(4).html("Na raspolaganju"),
              $("tr").children().eq(5).html("Rezervisano"),
              $("tr").children().eq(6).html("Izdato"),
              $("tr").children().eq(7).html("U prekoracenju"),
              $("tr").children().eq(8).html("Ukupna kolicina"));
    }),
    $(".checkOthers").change(function () {
        var e = $("#myTable").find(":checked").length;
        1 == e
            ? ($(this).addClass("bg-gray-200"),
              $("tr").children().eq(1).html('<a class="text-blue-800" href="knjigaOsnovniDetalji.php"><i class="far fa-copy"></i>  Pogledaj detalje</a>'),
              $("tr").children().eq(2).html('<a class="text-blue-800" href="editKnjiga.php.php"><i class="far fa-copy"></i>  Izmjeni knjigu</a>'),
              $("tr").children().eq(3).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fas fa-level-up-alt ml-4"></i>  Otpisi knjigu</a>'),
              $("tr").children().eq(4).html('<a class="text-blue-800" href="izdajKnjigu.php"><i class="far fa-hand-scissors"></i>  Izdaj knjigu</a>'),
              $("tr").children().eq(5).html('<a class="text-blue-800" href="vratiKnjigu.php"><i class="fas fa-redo-alt"></i>  Vrati knjigu</a>'),
              $("tr").children().eq(6).html('<a class="text-blue-800" href="otpisiKnjigu.php"><i class="far fa-calendar-check"></i>  Rezervisi knjigu</a>'),
              $("tr").children().eq(7).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fa fa-trash ml-4"></i>  Izbrisi knjigu</a>'),
              $("tr").children().eq(8).html(""))
            : e >= 2
            ? ($(this).addClass("bg-gray-200"),
              $("tr").children().eq(1).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fa fa-trash ml-4"></i>  Izbrisi knjigu</a>'),
              $("tr").children().eq(2).html(""),
              $("tr").children().eq(3).html(""),
              $("tr").children().eq(4).html(""),
              $("tr").children().eq(5).html(""),
              $("tr").children().eq(6).html(""),
              $("tr").children().eq(7).html(""),
              $("tr").children().eq(8).html(""))
            : ($(".form-checkbox").prop("checked", !1),
              $("tr").removeClass("bg-gray-200"),
              $("tr").children().eq(1).html('Naziv knjige<a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>'),
              $("tr")
                  .children()
                  .eq(2)
                  .html(
                      'Autor<i class="ml-2 fas fa-filter"></i><div id="autoriDropdown" class="autoriMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset"><li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"><input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search" onkeyup="filterFunction(" searchAutori ", "autoriDropdown ")" id="searchAutori"><br> <button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900"><i class="fas fa-search"></i></button></li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 2 </p>  </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg>  </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 3  </p> </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic 4  </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /></svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 5 </p> </li><li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"><input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 6 </p> </li> </div></ul><div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">  Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a> <a href="#"  class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]"> Ponisti <i class="fas fa-times ml-[4px]"></i> </a> </div></div>'
                  ),
              $("tr")
                  .children()
                  .eq(3)
                  .html(
                      'Kategorija<i class="ml-2 fas fa-filter"></i><div id="kategorijeDropdown" class="kategorijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset">  <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"> <input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search"  onkeyup="filterFunction("searchKategorije", "kategorijeDropdown")"  id="searchKategorije"><br><button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">  <i class="fas fa-search"></i> </button> </li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />   </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romani </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Udzbenici </p></li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Drame </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg>  </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Naucna fantastika </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romedije  </p>  </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"   viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Trileri </p> </li> </div> </ul> <div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]"> Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a>  <a href="#" class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">  Ponisti <i class="fas fa-times ml-[4px]"></i> </a></div></div>'
                  ),
              $("tr").children().eq(4).html("Na raspolaganju"),
              $("tr").children().eq(5).html("Rezervisano"),
              $("tr").children().eq(6).html("Izdato"),
              $("tr").children().eq(7).html("U prekoracenju"),
              $("tr").children().eq(8).html("Ukupna količina"));
    });

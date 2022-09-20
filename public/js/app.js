//open and close hamburger menu
$(function () {
  var hamburger = $('#hamburger');
  var sidebar = $('.sidebar');

  hamburger.on('click', function () {
    if (sidebar.hasClass('sidebar-active')) { // if menu is opened
      //close menu by removing active class
      sidebar.removeClass('sidebar-active');
      //make hamburger shape change
      hamburger.removeClass('fa-times');
      hamburger.addClass('fa-bars');
      //hide text and arrow
      $(".sidebar-item").addClass("hidden");
      $(".sidebar-item").removeClass("inline");
      //hide/close all opened submenues
      $('.aside-item').hide();
      //change all arrows which are up to down
      $('.arrow').removeClass('fa-angle-up');
      $('.arrow').addClass('fa-angle-down');
    } else {
      //open menu
      sidebar.addClass('sidebar-active');
      //make hamburger shape change
      hamburger.addClass('fa-times');
      hamburger.removeClass('fa-bars');
      //show text and arrow
      $(".sidebar-item").removeClass("hidden");
      $(".sidebar-item").addClass("inline");
    }
  });
});

//open close submenu
$(function () {
  var asideArrow = $('.asideArrow');
  asideArrow.on('click', function () {
    //find on which arrow is clicked
    var num = this.id.match(/\d+/)[0];
    //toggle submenu on click
    $('#aside-item_' + num).slideToggle();
    //change arrow on up or down
    if ($('#arrow-collapse_' + num).hasClass('fa-angle-down')) {
      $('#arrow-collapse_' + num).addClass('fa-angle-up');
      $('#arrow-collapse_' + num).removeClass('fa-angle-down');
    } else {
      $('#arrow-collapse_' + num).addClass('fa-angle-down');
      $('#arrow-collapse_' + num).removeClass('fa-angle-up');
    }
  });
});


//when chekbox is cheked button is enabled, otherwise it is disabled
$(function () {
  $('.form-checkbox').click(function () {
    if ($('.form-checkbox:checked').length > 0) {
      $('.disabled-btn').removeAttr('disabled');
    } else {
      $('.disabled-btn').attr('disabled', 'disabled');
    }
  });
});

$(document).ready(function () {
  //this will execute on page load(to be more specific when document ready event occurs)
  if ($('.activity-card').length > 6) {
    $('.activity-card:gt(6)').hide();
    $('.activity-showMore').show();
    $(this).text('Show more');
  }

  $('.activity-showMore').on('click', function () {
    //toggle elements with class .ty-compact-list that their index is bigger than 2
    $('.activity-card:gt(6)').toggle();
    //change text of show more element just for demonstration purposes to this demo
    if ($(this).text() == 'Show less') {
      $(this).text('Show more')
    } else {
      $(this).text('Show less');
    }
  });

  // Form
  $(".forma").submit(function (e) {
    e.preventDefault();
  });

  // Open Modal
  modal = $(".modal");
  $(".show-modal").on('click', function () {
    modal.removeClass('hidden');
  })
  // Close Modal
  $(".close-modal").on('click', function () {
    modal.addClass('hidden');
  })

  // Vrati Knjigu Modal
  vratiModal = $(".vrati-modal");
  $(".show-vratiModal").on('click', function () {
    vratiModal.removeClass('hidden');
  })
  // Close Modal
  $(".close-modal").on('click', function () {
    vratiModal.addClass('hidden');
  })

  // Otpisi Knjigu Modal
  otpisiModal = $(".otpisi-modal");
  $(".show-otpisiModal").on('click', function () {
    otpisiModal.removeClass('hidden');
  })
  // Close Modal
  $(".otpisi-modal").on('click', function () {
    otpisiModal.addClass('hidden');
  })

  // Izbrisi Zapis Modal
  izbrisiModal = $(".izbrisi-modal");
  $(".show-izbrisiModal").on('click', function () {
    izbrisiModal.removeClass('hidden');
  })
  // Close Modal
  $(".izbrisi-modal").on('click', function () {
    izbrisiModal.addClass('hidden');
  })
});

function AddReadMore() {
  //This limit you can set after how much characters you want to show Read More.
  var carLmt = 1000;
  // Text to show when text is collapsed
  var readMoreTxt = " ... Prikazi vise &#8681;";
  // Text to show when text is expanded
  var readLessTxt = " Prikazi manje &#8657;";


  //Traverse all selectors with this class and manupulate HTML part to show Read More
  $(".addReadMore").each(function () {
    if ($(this).find(".firstSec").length)
      return;

    var allstr = $(this).text();
    if (allstr.length > carLmt) {
      var firstSet = allstr.substring(0, carLmt);
      var secdHalf = allstr.substring(carLmt, allstr.length);
      var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'>" + readMoreTxt + "</span><span class='readLess' title='Click to Show Less'>" + readLessTxt + "</span>";
      $(this).html(strtoadd);
    }

  });
  //Read More and Read Less Click Event binding
  $(document).on("click", ".readMore,.readLess", function () {
    $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
  });
}

$(function () {
  //Calling function after Page Load
  AddReadMore();
});

// File upload
function dataFileDnD() {
  return {
    files: [],
    fileDragging: null,
    fileDropping: null,
    humanFileSize(size) {
      const i = Math.floor(Math.log(size) / Math.log(1024));
      return (
        (size / Math.pow(1024, i)).toFixed(2) * 1 +
        " " + ["B", "kB", "MB", "GB", "TB"][i]
      );
    },
    remove(index) {
      let files = [...this.files];
      files.splice(index, 1);

      this.files = createFileList(files);
    },
    drop(e) {
      let removed, add;
      let files = [...this.files];

      removed = files.splice(this.fileDragging, 1);
      files.splice(this.fileDropping, 0, ...removed);

      this.files = createFileList(files);

      this.fileDropping = null;
      this.fileDragging = null;
    },
    dragenter(e) {
      let targetElem = e.target.closest("[draggable]");

      this.fileDropping = targetElem.getAttribute("data-index");
    },
    dragstart(e) {
      this.fileDragging = e.target
        .closest("[draggable]")
        .getAttribute("data-index");
      e.dataTransfer.effectAllowed = "move";
    },
    loadFile(file) {
      const preview = document.querySelectorAll(".preview");
      const blobUrl = URL.createObjectURL(file);

      preview.forEach(elem => {
        elem.onload = () => {
          URL.revokeObjectURL(elem.src); // free memory
        };
      });

      return blobUrl;
    },
    addFiles(e) {
      const files = createFileList([...this.files], [...e.target.files]);
      this.files = files;
      this.form.formData.files = [...files];
    }
  };
}

// Student image upload
var loadFileStudent = function (event) {
  var imageStudent = document.getElementById('image-output-student');
  imageStudent.style.display = "block";
  imageStudent.src = URL.createObjectURL(event.target.files[0]);
};

// Librarian image upload
var loadFileLibrarian = function (event) {
  var imageStudent = document.getElementById('image-output-librarian');
  imageStudent.style.display = "block";
  imageStudent.src = URL.createObjectURL(event.target.files[0]);
};

// Category icon upload
$("#icon-upload").change(function () {
  $("#icon-output").text(this.files[0].name);
});

function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (x.children.length == 2) {
        if (x.children[1].children.length == 1) {
          let [firstName, secondName] = [x.children[1].children[0], y.children[1].children[0]]
          //check if the two rows should switch place:
          if (firstName.innerHTML.toLowerCase() > secondName.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else {
          let [firstName1, secondName1] = [x.children[1], y.children[1]]
          if (firstName1.innerHTML.toLowerCase() > secondName1.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      } else if (x.children.length == 1) {
        let [firstName2, secondName2] = [x.children[0], y.children[0]]
        if (firstName2.innerHTML.toLowerCase() > secondName2.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
//rezervacije promjena statusa
let rezervacije = $('.rezervacije');
rezervacije.on('click', (event) => {
  if (event.target.classList.contains('reservedStatus')) {
    event.target.closest('.changeStatus').classList.add('hidden');
    event.target.closest('.changeStatus').nextElementSibling.classList.remove('hidden');
    event.target.closest('.changeStatus').nextElementSibling.nextElementSibling.nextElementSibling.children[0].classList.remove('hidden');
    event.target.closest('.changeBg').classList.remove('bg-gray-200');
  }
  if (event.target.classList.contains('deniedStatus')) {
    event.target.closest('.changeStatus').classList.add('hidden');
    event.target.closest('.changeStatus').nextElementSibling.nextElementSibling.classList.remove('hidden');
    event.target.closest('.changeStatus').nextElementSibling.nextElementSibling.nextElementSibling.children[0].classList.remove('hidden');
    event.target.closest('.changeBg').classList.remove('bg-gray-200');
  }

})
//ucenikEvidencija, evidencijaIznajmljivanja - funkcija promjene statusa
$(".reservedBook").click(function () {
  var checkMark = $(this);
  var changeColorStatus = checkMark.closest("tr").find(".borderColor")
  var changeTextStatus = checkMark.closest("tr").find(".borderText")
  changeColorStatus.removeClass('border-yellow-500')
  changeColorStatus.removeClass('bg-transparent')
  changeColorStatus.addClass('bg-yellow-200')
  changeTextStatus.text('Potvrdjene rezervacije')
  changeTextStatus.removeClass('text-yellow-500')
  changeTextStatus.addClass('text-yellow-700')
  checkMark.parent().addClass('hidden')
  checkMark.parent().next().removeClass('hidden')
  var backgroundRowChange = checkMark.closest("tr")
  backgroundRowChange.removeClass('bg-gray-200')
})

$(".deniedBook").click(function () {
  var checkMark = $(this);
  var changeColorStatus = checkMark.closest("tr").find(".borderColor")
  var changeTextStatus = checkMark.closest("tr").find(".borderText")
  changeColorStatus.removeClass('border-yellow-500')
  changeColorStatus.removeClass('bg-transparent')
  changeColorStatus.addClass('bg-red-200')
  changeTextStatus.text('Odbijene rezervacije')
  changeTextStatus.removeClass('text-yellow-500')
  changeTextStatus.addClass('text-red-800')
  checkMark.parent().addClass('hidden')
  checkMark.parent().next().removeClass('hidden')
  var backgroundRowChange = checkMark.closest("tr")
  backgroundRowChange.removeClass('bg-gray-200')
})

// Form validation for new librarian
function validacijaBibliotekar() {

  $("#validateNameBibliotekar").empty();
  $("#validateJmbgBibliotekar").empty();
  $("#validateEmailBibliotekar").empty();
  $("#validateUsernameBibliotekar").empty();
  $("#validatePwBibliotekar").empty();
  $("#validatePw2Bibliotekar").empty();


  let nameBibliotekar = $("#imePrezimeBibliotekar").val();
  let jmbgBibliotekar = $("#jmbgBibliotekar").val();
  let emailBibliotekar = $("#emailBibliotekar").val();
  let usernameBibliotekar = $("#usernameBibliotekar").val();
  let pwBibliotekar = $("#pwBibliotekar").val();
  let pw2Bibliotekar = $("#pw2Bibliotekar").val();

  if (nameBibliotekar.length == 0) {
    $('#validateNameBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>');
  }

  if (jmbgBibliotekar.length == 0) {
    $('#validateJmbgBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
  }

  if (emailBibliotekar.length == 0) {
    $('#validateEmailBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
  }

  if (usernameBibliotekar.length == 0) {
    $('#validateUsernameBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>');
  }

  if (pwBibliotekar.length == 0) {
    $('#validatePwBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>');
  }

  if (pw2Bibliotekar.length == 0) {
    $('#validatePw2Bibliotekar').append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
  }
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

$("#sacuvajBibliotekara").keypress(function (e) {
  if (e.which == 13) {
    validacijaBibliotekar();
    return false;
  }
});

// Form validation for editing librarian info
function validacijaBibliotekarEdit() {

  $("#validateNameBibliotekarEdit").empty();
  $("#validateJmbgBibliotekarEdit").empty();
  $("#validateEmailBibliotekarEdit").empty();
  $("#validateUsernameBibliotekarEdit").empty();
  $("#validatePwBibliotekarEdit").empty();
  $("#validatePw2BibliotekarEdit").empty();


  let nameBibliotekarEdit = $("#imePrezimeBibliotekarEdit").val();
  let jmbgBibliotekarEdit = $("#jmbgBibliotekarEdit").val();
  let emailBibliotekarEdit = $("#emailBibliotekarEdit").val();
  let usernameBibliotekarEdit = $("#usernameBibliotekarEdit").val();
  let pwBibliotekarEdit = $("#pwBibliotekarEdit").val();
  let pw2BibliotekarEdit = $("#pw2BibliotekarEdit").val();

  if (nameBibliotekarEdit.length == 0) {
    $('#validateNameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>');
  }

  if (jmbgBibliotekarEdit.length == 0) {
    $('#validateJmbgBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
  }

  if (emailBibliotekarEdit.length == 0) {
    $('#validateEmailBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
  }

  if (usernameBibliotekarEdit.length == 0) {
    $('#validateUsernameBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>');
  }

  if (pwBibliotekarEdit.length == 0) {
    $('#validatePwBibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>');
  }

  if (pw2BibliotekarEdit.length == 0) {
    $('#validatePw2BibliotekarEdit').append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
  }
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

$("#sacuvajBibliotekaraEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaBibliotekarEdit();
    return false;
  }
});

// Form validation for new student
function validacijaUcenik() {

  $("#validateNameUcenik").empty();
  $("#validateJmbgUcenik").empty();
  $("#validateEmailUcenik").empty();
  $("#validateUsernameUcenik").empty();
  $("#validatePwUcenik").empty();
  $("#validatePw2Ucenik").empty();


  let nameUcenik = $("#imePrezimeUcenik").val();
  let jmbgUcenik = $("#jmbgUcenik").val();
  let emailUcenik = $("#emailUcenik").val();
  let usernameUcenik = $("#usernameUcenik").val();
  let pwUcenik = $("#pwUcenik").val();
  let pw2Ucenik = $("#pw2Ucenik").val();

  if (nameUcenik.length == 0) {
    $('#validateNameUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>');
  }

  if (jmbgUcenik.length == 0) {
    $('#validateJmbgUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
  }

  if (emailUcenik.length == 0) {
    $('#validateEmailUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
  }

  if (usernameUcenik.length == 0) {
    $('#validateUsernameUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>');
  }

  if (pwUcenik.length == 0) {
    $('#validatePwUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>');
  }

  if (pw2Ucenik.length == 0) {
    $('#validatePw2Ucenik').append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
  }
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

$("#sacuvajUcenika").keypress(function (e) {
  if (e.which == 13) {
    validacijaUcenik();
    return false;
  }
});

// Form validation for editing student info
function validacijaUcenikEdit() {

  $("#validateNameUcenikEdit").empty();
  $("#validateJmbgUcenikEdit").empty();
  $("#validateEmailUcenikEdit").empty();
  $("#validateUsernameUcenikEdit").empty();
  $("#validatePwUcenikEdit").empty();
  $("#validatePw2UcenikEdit").empty();


  let nameUcenikEdit = $("#imePrezimeUcenikEdit").val();
  let jmbgUcenikEdit = $("#jmbgUcenikEdit").val();
  let emailUcenikEdit = $("#emailUcenikEdit").val();
  let usernameUcenikEdit = $("#usernameUcenikEdit").val();
  let pwUcenikEdit = $("#pwUcenikEdit").val();
  let pw2UcenikEdit = $("#pw2UcenikEdit").val();

  if (nameUcenikEdit.length == 0) {
    $('#validateNameUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime!</p>');
  }

  if (jmbgUcenikEdit.length == 0) {
    $('#validateJmbgUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti JMBG!</p>');
  }

  if (emailUcenikEdit.length == 0) {
    $('#validateEmailUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti validnu e-mail adresu!</p>');
  }

  if (usernameUcenikEdit.length == 0) {
    $('#validateUsernameUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti korisnicko ime!</p>');
  }

  if (pwUcenikEdit.length == 0) {
    $('#validatePwUcenikEdit').append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>');
  }

  if (pw2UcenikEdit.length == 0) {
    $('#validatePw2UcenikEdit').append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
  }
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

$("#sacuvajUcenikaEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaUcenikEdit();
    return false;
  }
});

// Form validation for new book
function validacijaKnjiga() {

  $("#validateNazivKnjiga").empty();
  $("#validateKategorija").empty();
  $("#validateZanr").empty();
  $("#validateAutori").empty();
  $("#validateIzdavac").empty();
  $("#validateGodinaIzdavanja").empty();
  $("#validateKnjigaKolicina").empty();


  let nazivKnjiga = $("#nazivKnjiga").val();
  let kategorija = $("#kategorijaInput").val();
  let zanr = $("#zanroviInput").val();
  let autori = $("#autoriInput").val();
  let izdavac = $("#izdavac").val();
  let godinaIzdavanja = $("#godinaIzdavanja").val();
  let knjigaKolicina = $("#knjigaKolicina").val();

  if (nazivKnjiga.length == 0) {
    $('#validateNazivKnjiga').append('<p style="color:red;font-size:13px;">Morate unijeti naziv knjige!</p>');
  }

  if (kategorija.length == 0) {
    $('#validateKategorija').append('<p style="color:red;font-size:13px;">Morate selektovati kategoriju!</p>');
  }

  if (zanr.length == 0) {
    $('#validateZanr').append('<p style="color:red;font-size:13px;">Morate selektovati zanr!</p>');
  }

  if (autori.length == 0) {
    $('#validateAutori').append('<p style="color:red;font-size:13px;">Morate odabrati autore!</p>');
  }

  if (izdavac == null) {
    $('#validateIzdavac').append('<p style="color:red;font-size:13px;">Morate selektovati izdavaca!</p>');
  }

  if (godinaIzdavanja == null) {
    $('#validateGodinaIzdavanja').append('<p style="color:red;font-size:13px;">Morate selektovati godinu izdavanja!</p>');
  }

  if (knjigaKolicina.length == 0) {
    $('#validateKnjigaKolicina').append('<p style="color:red;font-size:13px;">Morate unijeti kolicinu!</p>');
  }
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

$("#sacuvajKnjigu").keypress(function (e) {
  if (e.which == 13) {
    validacijaKnjiga();
    return false;
  }
});

// Form validation for editing book info
function validacijaKnjigaEdit() {

  $("#validateNazivKnjigaEdit").empty();
  $("#validateKategorijaEdit").empty();
  $("#validateZanrEdit").empty();
  $("#validateAutoriEdit").empty();
  $("#validateIzdavacEdit").empty();
  $("#validateGodinaIzdavanjaEdit").empty();
  $("#validateKnjigaKolicinaEdit").empty();


  let nazivKnjigaEdit = $("#nazivKnjigaEdit").val();
  let kategorijaInputEdit = $("#kategorijaInputEdit").val();
  let zanroviInputEdit = $("#zanroviInputEdit").val();
  let autoriInputEdit = $("#autoriInputEdit").val();
  let izdavacEdit = $("#izdavacEdit").val();
  let godinaIzdavanjaEdit = $("#godinaIzdavanjaEdit").val();
  let knjigaKolicinaEdit = $("#knjigaKolicinaEdit").val();

  if (nazivKnjigaEdit.length == 0) {
    $('#validateNazivKnjigaEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv knjige!</p>');
  }

  if (kategorijaInputEdit.length == 0) {
    $('#validateKategorijaEdit').append('<p style="color:red;font-size:13px;">Morate selektovati kategoriju!</p>');
  }

  if (zanroviInputEdit.length == 0) {
    $('#validateZanrEdit').append('<p style="color:red;font-size:13px;">Morate selektovati zanr!</p>');
  }

  if (autoriInputEdit.length == 0) {
    $('#validateAutoriEdit').append('<p style="color:red;font-size:13px;">Morate odabrati autore!</p>');
  }

  if (izdavacEdit == null) {
    $('#validateIzdavacEdit').append('<p style="color:red;font-size:13px;">Morate selektovati izdavaca!</p>');
  }

  if (godinaIzdavanjaEdit == null) {
    $('#validateGodinaIzdavanjaEdit').append('<p style="color:red;font-size:13px;">Morate selektovati godinu izdavanja!</p>');
  }

  if (knjigaKolicinaEdit.length == 0) {
    $('#validateKnjigaKolicinaEdit').append('<p style="color:red;font-size:13px;">Morate unijeti kolicinu!</p>');
  }
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

$("#sacuvajKnjiguEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaKnjigaEdit();
    return false;
  }
});

// Form validation for new specification of the book
function validacijaSpecifikacija() {

  $("#validateBrStrana").empty();
  $("#validatePismo").empty();
  $("#validatePovez").empty();
  $("#validateFormat").empty();
  $("#validateIsbn").empty();

  let brStrana = $("#brStrana").val();
  let pismo = $("#pismo").val();
  let povez = $("#povez").val();
  let format = $("#format").val();
  let isbn = $("#isbn").val();

  if (brStrana.length == 0) {
    $('#validateBrStrana').append('<p style="color:red;font-size:13px;">Morate unijeti broj strana!</p>');
  }

  if (pismo == null) {
    $('#validatePismo').append('<p style="color:red;font-size:13px;">Morate selektovati pismo!</p>');
  }

  if (povez == null) {
    $('#validatePovez').append('<p style="color:red;font-size:13px;">Morate selektovati povez!</p>');
  }

  if (format == null) {
    $('#validateFormat').append('<p style="color:red;font-size:13px;">Morate selektovati format!</p>');
  }

  if (isbn.length == 0) {
    $('#validateIsbn').append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
  }
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

$("#sacuvajSpecifikaciju").keypress(function (e) {
  if (e.which == 13) {
    validacijaSpecifikacija();
    return false;
  }
});

// Form validation for editing specification of the book
function validacijaSpecifikacijaEdit() {

  $("#validateBrStranaEdit").empty();
  $("#validatePismoEdit").empty();
  $("#validatePovezEdit").empty();
  $("#validateFormatEdit").empty();
  $("#validateIsbnEdit").empty();

  let brStranaEdit = $("#brStranaEdit").val();
  let pismoEdit = $("#pismoEdit").val();
  let povezEdit = $("#povezEdit").val();
  let formatEdit = $("#formatEdit").val();
  let isbnEdit = $("#isbnEdit").val();

  if (brStranaEdit.length == 0) {
    $('#validateBrStranaEdit').append('<p style="color:red;font-size:13px;">Morate unijeti broj strana!</p>');
  }

  if (pismoEdit == null) {
    $('#validatePismoEdit').append('<p style="color:red;font-size:13px;">Morate selektovati pismo!</p>');
  }

  if (povezEdit == null) {
    $('#validatePovezEdit').append('<p style="color:red;font-size:13px;">Morate selektovati povez!</p>');
  }

  if (formatEdit == null) {
    $('#validateFormatEdit').append('<p style="color:red;font-size:13px;">Morate selektovati format!</p>');
  }

  if (isbnEdit.length == 0) {
    $('#validateIsbnEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ISBN!</p>');
  }
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

$("#sacuvajSpecifikacijuEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaSpecifikacijaEdit();
    return false;
  }
});

// Form validation for renting books
function validacijaIzdavanje() {

  $("#validateUcenikIzdavanje").empty();
  $("#validateDatumIzdavanja").empty();

  let ucenikIzdavanje = $("#ucenikIzdavanje").val();
  let datumIzdavanja = $("#datumIzdavanja").val();

  if (ucenikIzdavanje == null) {
    $('#validateUcenikIzdavanje').append('<p style="color:red;font-size:13px;">Morate selektovati ucenika!</p>');
  }

  if (datumIzdavanja.length === 0) {
    $('#validateDatumIzdavanja').append('<p style="color:red;font-size:13px;">Morate selektovati datum izdavanja!</p>');
  }
}

function clearErrorsUcenikIzdavanje() {
  $("#validateUcenikIzdavanje").empty();
}

function clearErrorsDatumIzdavanja() {
  $("#validateDatumIzdavanja").empty();
}

$("#izdajKnjigu").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavanje();
    return false;
  }
});

// Form validation for making reservations
function validacijaRezervisanje() {

  $("#validateUcenikRezervisanje").empty();
  $("#validateDatumRezervisanja").empty();

  let ucenikRezervisanje = $("#ucenikRezervisanje").val();
  let datumRezervisanja = $("#datumRezervisanja").val();

  if (ucenikRezervisanje == null) {
    $('#validateUcenikRezervisanje').append('<p style="color:red;font-size:13px;">Morate selektovati učenika!</p>');
  }

  if (datumRezervisanja.length == 0) {
    $('#validateDatumRezervisanja').append('<p style="color:red;font-size:13px;">Morate selektovati datum rezervisanja!</p>');
  }
}

function clearErrorsUcenikRezervisanje() {
  $("#validateUcenikRezervisanje").empty();
}

function clearErrorsDatumRezervisanja() {
  $("#validateDatumRezervisanja").empty();
}

$("#rezervisiKnjigu").keypress(function (e) {
  if (e.which == 13) {
    validacijaRezervisanje();
    return false;
  }
});

// Form validation for new category
function validacijaKategorija() {

  $("#validateNazivKategorije").empty();

  let nazivKategorije = $("#nazivKategorije").val();

  if (nazivKategorije.length == 0) {
    $('#validateNazivKategorije').append('<p style="color:red;font-size:13px;">Morate unijeti naziv kategorije!</p>');
  }
}

function clearErrorsNazivKategorije() {
  $("#validateNazivKategorije").empty();
}

$("#sacuvajKategoriju").keypress(function (e) {
  if (e.which == 13) {
    validacijaKategorija();
    return false;
  }
});

// Form validation for editing category info
function validacijaKategorijaEdit() {

  $("#validateNazivKategorijeEdit").empty();

  let nazivKategorijeEdit = $("#nazivKategorijeEdit").val();

  if (nazivKategorijeEdit.length == 0) {
    $('#validateNazivKategorijeEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv kategorije!</p>');
  }
}

function clearErrorsNazivKategorijeEdit() {
  $("#validateNazivKategorijeEdit").empty();
}

$("#sacuvajKategorijuEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaKategorijaEdit();
    return false;
  }
});

// Form validation for new author
function validacijaAutor() {

  $("#validateImePrezimeAutor").empty();

  let imePrezimeAutor = $("#imePrezimeAutor").val();

  if (imePrezimeAutor.length == 0) {
    $('#validateImePrezimeAutor').append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime autora!</p>');
  }
}

function clearErrorsImePrezimeAutor() {
  $("#validateImePrezimeAutor").empty();
}

$("#sacuvajAutora").keypress(function (e) {
  if (e.which == 13) {
    validacijaAutor();
    return false;
  }
});

// Form validation for editing author info
function validacijaAutorEdit() {

  $("#validateImePrezimeAutorEdit").empty();

  let imePrezimeAutorEdit = $("#imePrezimeAutorEdit").val();

  if (imePrezimeAutorEdit.length == 0) {
    $('#validateImePrezimeAutorEdit').append('<p style="color:red;font-size:13px;">Morate unijeti ime i prezime autora!</p>');
  }
}

function clearErrorsImePrezimeAutorEdit() {
  $("#validateImePrezimeAutorEdit").empty();
}

$("#sacuvajAutoraEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaAutorEdit();
    return false;
  }
});

// Form validation for new genre
function validacijaZanr() {

  $("#validateNazivZanra").empty();

  let nazivZanra = $("#nazivZanra").val();

  if (nazivZanra.length == 0) {
    $('#validateNazivZanra').append('<p style="color:red;font-size:13px;">Morate unijeti naziv zanra!</p>');
  }
}

function clearErrorsNazivZanra() {
  $("#validateNazivZanra").empty();
}

$("#sacuvajZanr").keypress(function (e) {
  if (e.which == 13) {
    validacijaZanr();
    return false;
  }
});

// Form validation for editing genre info
function validacijaZanrEdit() {

  $("#validateNazivZanraEdit").empty();

  let nazivZanraEdit = $("#nazivZanraEdit").val();

  if (nazivZanraEdit.length == 0) {
    $('#validateNazivZanraEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv zanra!</p>');
  }
}

function clearErrorsNazivZanraEdit() {
  $("#validateNazivZanraEdit").empty();
}

$("#sacuvajZanrEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaZanrEdit();
    return false;
  }
});

// Form validation for new publisher
function validacijaIzdavac() {

  $("#validateNazivIzdavac").empty();

  let nazivIzdavac = $("#nazivIzdavac").val();

  if (nazivIzdavac.length == 0) {
    $('#validateNazivIzdavac').append('<p style="color:red;font-size:13px;">Morate unijeti naziv izdavaca!</p>');
  }
}

function clearErrorsNazivIzdavac() {
  $("#validateNazivIzdavac").empty();
}

$("#sacuvajIzdavac").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavac();
    return false;
  }
});

// Form validation for editing publisher info
function validacijaIzdavacEdit() {

  $("#validateNazivIzdavacEdit").empty();

  let nazivIzdavacEdit = $("#nazivIzdavacEdit").val();

  if (nazivIzdavacEdit.length == 0) {
    $('#validateNazivIzdavacEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv izdavaca!</p>');
  }
}

function clearErrorsNazivIzdavacEdit() {
  $("#validateNazivIzdavacEdit").empty();
}

$("#sacuvajIzdavacEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaIzdavacEdit();
    return false;
  }
});

// Form validation for new book bind
function validacijaPovez() {

  $("#validateNazivPovez").empty();

  let nazivPovez = $("#nazivPovez").val();

  if (nazivPovez.length == 0) {
    $('#validateNazivPovez').append('<p style="color:red;font-size:13px;">Morate unijeti naziv poveza!</p>');
  }
}

function clearErrorsNazivPovez() {
  $("#validateNazivPovez").empty();
}

$("#sacuvajPovez").keypress(function (e) {
  if (e.which == 13) {
    validacijaPovez();
    return false;
  }
});

// Form validation for editing book bind info
function validacijaPovezEdit() {

  $("#validateNazivPovezEdit").empty();

  let nazivPovezEdit = $("#nazivPovezEdit").val();

  if (nazivPovezEdit.length == 0) {
    $('#validateNazivPovezEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv poveza!</p>');
  }
}

function clearErrorsNazivPovezEdit() {
  $("#validateNazivPovezEdit").empty();
}

$("#sacuvajPovezEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaPovezEdit();
    return false;
  }
});

// Form validation for new book format
function validacijaFormat() {

  $("#validateNazivFormat").empty();

  let nazivFormat = $("#nazivFormat").val();

  if (nazivFormat.length == 0) {
    $('#validateNazivFormat').append('<p style="color:red;font-size:13px;">Morate unijeti naziv formata!</p>');
  }
}

function clearErrorsNazivFormat() {
  $("#validateNazivFormat").empty();
}

$("#sacuvajFormat").keypress(function (e) {
  if (e.which == 13) {
    validacijaFormat();
    return false;
  }
});

// Form validation for editing book format info
function validacijaFormatEdit() {

  $("#validateNazivFormatEdit").empty();

  let nazivFormatEdit = $("#nazivFormatEdit").val();

  if (nazivFormatEdit.length == 0) {
    $('#validateNazivFormatEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv formata!</p>');
  }
}

function clearErrorsNazivFormatEdit() {
  $("#validateNazivFormatEdit").empty();
}

$("#sacuvajFormatEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaFormatEdit();
    return false;
  }
});

// Form validation for new book script
function validacijaPismo() {

  $("#validateNazivPismo").empty();

  let nazivPismo = $("#nazivPismo").val();

  if (nazivPismo.length == 0) {
    $('#validateNazivPismo').append('<p style="color:red;font-size:13px;">Morate unijeti naziv pisma!</p>');
  }
}

function clearErrorsNazivPismo() {
  $("#validateNazivPismo").empty();
}

$("#sacuvajPismo").keypress(function (e) {
  if (e.which == 13) {
    validacijaPismo();
    return false;
  }
});

// Form validation for new book script
function validacijaPismoEdit() {

  $("#validateNazivPismoEdit").empty();

  let nazivPismoEdit = $("#nazivPismoEdit").val();

  if (nazivPismoEdit.length == 0) {
    $('#validateNazivPismoEdit').append('<p style="color:red;font-size:13px;">Morate unijeti naziv pisma!</p>');
  }
}

function clearErrorsNazivPismoEdit() {
  $("#validateNazivPismoEdit").empty();
}

$("#sacuvajPismoEdit").keypress(function (e) {
  if (e.which == 13) {
    validacijaPismoEdit();
    return false;
  }
});

// Form validation for reseting password - student
function validacijaSifraUcenik() {

  $("#validatePwResetUcenik").empty();
  $("#validatePw2ResetUcenik").empty();

  let pwResetUcenik = $("#pwResetUcenik").val();
  let pw2ResetUcenik = $("#pw2ResetUcenik").val();

  if (pwResetUcenik.length == 0) {
    $('#validatePwResetUcenik').append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>');
  }

  if (pw2ResetUcenik.length == 0) {
    $('#validatePw2ResetUcenik').append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
  }
}

function clearErrorsPwResetUcenik() {
  $("#validatePwResetUcenik").empty();
}

function clearErrorsPw2ResetUcenik() {
  $("#validatePw2ResetUcenik").empty();
}

$("#resetujSifruUcenik").keypress(function (e) {
  if (e.which == 13) {
    validacijaSifraUcenik();
    return false;
  }
});

// Form validation for reseting password - librarian
function validacijaSifraBibliotekar() {

  $("#validatePwResetBibliotekar").empty();
  $("#validatePw2ResetBibliotekar").empty();

  let pwResetBibliotekar = $("#pwResetBibliotekar").val();
  let pw2ResetBibliotekar = $("#pw2ResetBibliotekar").val();

  if (pwResetBibliotekar.length == 0) {
    $('#validatePwResetBibliotekar').append('<p style="color:red;font-size:13px;">Morate unijeti sifru!</p>');
  }

  if (pw2ResetBibliotekar.length == 0) {
    $('#validatePw2ResetBibliotekar').append('<p style="color:red;font-size:13px;">Morate ponoviti sifru!</p>');
  }
}

function clearErrorsPwResetBibliotekar() {
  $("#validatePwResetBibliotekar").empty();
}

function clearErrorsPw2ResetBibliotekar() {
  $("#validatePw2ResetBibliotekar").empty();
}

$("#resetujSifruBibliotekar").keypress(function (e) {
  if (e.which == 13) {
    validacijaSifraBibliotekar();
    return false;
  }
});

function sortTableDate(row) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = $(".sortTableDate");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table[0].rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[row];
      y = rows[i + 1].getElementsByTagName("TD")[row];
      let first = $(x).text().split('.')
      let [d1, m1, y1] = [parseInt(first[0]), parseInt(first[1]), parseInt(first[2])]
      let second = $(y).text().split('.')
      let [d2, m2, y2] = [parseInt(second[0]), parseInt(second[1]), parseInt(second[2])]
      //check if the two rows should switch place:
      if (y1 > y2) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      } else if ((y1 == y2) && (m1 > m2)) {
        shouldSwitch = true;
        break;
      } else if ((y1 == y2 && m1 == m2) && d1 > d2) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

$('#autoriMenu').on('click', function () {
  $('.autoriMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var autoriMenu = $(".autoriMenu");
  if (!autoriMenu.is(e.target) &&
    autoriMenu.has(e.target).length === 0 &&
    !$(e.target).is('.autoriMenu')) {
    autoriMenu.slideUp();
  }
});

$('#kategorijeMenu').on('click', function () {
  $('.kategorijeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var kategorijeMenu = $(".kategorijeMenu");
  if (!kategorijeMenu.is(e.target) &&
    kategorijeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.kategorijeMenu')) {
    kategorijeMenu.slideUp();
  }
});

// Books
$('.uceniciDrop-toggle').on('click', function () {
  $('.uceniciMenu').toggle();
})


$(document).on('mouseup', function (e) {
  var uceniciMenu = $(".uceniciMenu");
  if (!uceniciMenu.is(e.target) &&
    uceniciMenu.has(e.target).length === 0 &&
    !$(e.target).is('.uceniciMenu')) {
    uceniciMenu.slideUp();
  }
});

$('.uceniciDrop-toggle2').on('click', function () {
  $('.uceniciMenu2').toggle();
})

$(document).on('mouseup', function (e) {
  var uceniciMenu2 = $(".uceniciMenu2");
  if (!uceniciMenu2.is(e.target) &&
    uceniciMenu2.has(e.target).length === 0 &&
    !$(e.target).is('.uceniciMenu2')) {
    uceniciMenu2.slideUp();
  }
});


// 

$('.bibliotekariDrop-toggle').on('click', function () {
  $('.bibliotekariMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var bibliotekariMenu = $(".bibliotekariMenu");
  if (!bibliotekariMenu.is(e.target) &&
    bibliotekariMenu.has(e.target).length === 0 &&
    !$(e.target).is('.bibliotekariMenu')) {
    bibliotekariMenu.slideUp();
  }
});

$('#knjigeMenu').on('click', function () {
  $('.knjigeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var knjigeMenu = $(".knjigeMenu");
  if (!knjigeMenu.is(e.target) &&
    knjigeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.knjigeMenu')) {
    knjigeMenu.slideUp();
  }
});

$('#transakcijeMenu').on('click', function () {
  $('.transakcijeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var transakcijeMenu = $(".transakcijeMenu");
  if (!transakcijeMenu.is(e.target) &&
    transakcijeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.transakcijeMenu')) {
    transakcijeMenu.slideUp();
  }
});

$('.datumDrop-toggle').on('click', function () {
  $('.datumMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var datumMenu = $(".datumMenu");
  if (!datumMenu.is(e.target) &&
    datumMenu.has(e.target).length === 0 &&
    !$(e.target).is('.datumMenu')) {
    datumMenu.slideUp();
  }
});

$('.zadrzavanjeDrop-toggle').on('click', function () {
  $('.zadrzavanjeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var datumMenu = $(".zadrzavanjeMenu");
  if (!datumMenu.is(e.target) &&
    datumMenu.has(e.target).length === 0 &&
    !$(e.target).is('.zadrzavanjeMenu')) {
    datumMenu.slideUp();
  }
});

$('.vracanjeDrop-toggle').on('click', function () {
  $('.vracanjeMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var vracanjeMenu = $(".vracanjeMenu");
  if (!vracanjeMenu.is(e.target) &&
    vracanjeMenu.has(e.target).length === 0 &&
    !$(e.target).is('.vracanjeMenu')) {
    vracanjeMenu.slideUp();
  }
});

$('.statusDrop-toggle').on('click', function () {
  $('.statusMenu').toggle();
})

$(document).on('mouseup', function (e) {
  var statusMenu = $(".statusMenu");
  if (!statusMenu.is(e.target) &&
    statusMenu.has(e.target).length === 0 &&
    !$(e.target).is('.statusMenu')) {
    statusMenu.slideUp();
  }
});

function filterFunction(id, dropdown, item) {
  var input, filter, ul, li, a, i;
  console.log(id);
  console.log(dropdown);

  input = document.getElementById(id);
  filter = input.value.toUpperCase();
  div = document.getElementById(dropdown);
  li = document.getElementsByClassName(item);
  text = div.getElementsByTagName("p");

  for (i = 0; i < text.length; i++) {
    txtValue = text[i].textContent || text[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

// Multiple select dropdown list - new book
function dropdown() {
  return {
    options: [],
    selected: [],
    show: false,
    open() {
      this.show = true
    },
    close() {
      this.show = false
    },
    isOpen() {
      return this.show === true
    },
    select(index, event) {

      if (!this.options[index].selected) {
        this.options[index].selected = true;
        this.options[index].element = event.target;
        this.selected.push(index);
      } else {
        this.selected.splice(this.selected.lastIndexOf(index), 1);
        this.options[index].selected = false
      }
    },
    remove(index, option) {
      this.options[option].selected = false;
      this.selected.splice(index, 1);
    },
    loadOptions() {
      const options = document.getElementById('kategorija').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsEdit() {
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsZanrovi() {
      const options = document.getElementById('zanr').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsZanroviEdit() {
      const options = document.getElementById('zanrEdit').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsAutori() {
      const options = document.getElementById('autori').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    loadOptionsAutoriEdit() {
      const options = document.getElementById('autoriEdit').options;
      for (let i = 0; i < options.length; i++) {
        this.options.push({
          value: options[i].value,
          text: options[i].innerText,
          selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
        });
      }
    },
    selectedValues() {
      return this.selected.map((option) => {
        return this.options[option].value;
      })
    },
    selectedValuesKategorijaEdit() {
      const options = document.getElementById('kategorijaEdit').options;
      return options[1].innerText;
    },
    selectedValuesZanrEdit() {
      const options = document.getElementById('zanrEdit').options;
      return options[2].innerText;
    },
    selectedValuesAutoriEdit() {
      const options = document.getElementById('autoriEdit').options;
      return options[0].innerText;
    }
  }
}

// function funkcijaDatumVracanja() {
//   var selectedDate = new Date($('#datumIzdavanja').val());
//   var numberOfDaysToAdd = 5;

//   selectedDate.setDate(selectedDate.getDate() + numberOfDaysToAdd);

//   var day = selectedDate.getDate();
//   var month = selectedDate.getMonth() + 1;
//   var year = selectedDate.getFullYear();

//   var newDate = [day, month, year].join('/');

//   document.getElementById('datumVracanja').value = newDate;
// }

//click on one and check all checkboxes (vratiKnjigu.php)
$('.select-all').click(function () {
  if ($(this).is(':checked')) {
    $('.form-checkbox').prop('checked', true);
    $('tr').addClass('bg-gray-200');
  } else {
    $('.form-checkbox').prop('checked', false);
    $('tr').removeClass('bg-gray-200');
  }
});

$('.form-checkbox').click(function () {
  if ($(this).is(':checked')) {
    $(this).closest('tr').addClass('bg-gray-200');
  } else {
    $(this).closest('tr').removeClass('bg-gray-200');
  }
})

// Edit book multimedia - delete (hide) image
$('#hide-image1').click(function () {
  $('.hiddenImage1').hide();
});

$('#hide-image2').click(function () {
  $('.hiddenImage2').hide();
});

// Header - dropdown for create button
$('#dropdownCreate').click(function () {
  $('.dropdown-create').toggle();
});

$(document).on('mouseup', function (e) {
  var dropdownCreate = $(".dropdown-create");
  if (!dropdownCreate.is(e.target) &&
    dropdownCreate.has(e.target).length === 0 &&
    !$(e.target).is('.dropdownCreate')) {
    dropdownCreate.slideUp();
  }
});

// Header - dropdown for profile button
$('#dropdownProfile').click(function () {
  $('.dropdown-profile').toggle();
});

$(document).on('mouseup', function (e) {
  var dropdownProfile = $(".dropdown-profile");
  if (!dropdownProfile.is(e.target) &&
    dropdownProfile.has(e.target).length === 0 &&
    !$(e.target).is('.dropdownProfile')) {
    dropdownProfile.slideUp();
  }
});

// Category - table - dropdown
$(".dotsCategory").click(function () {
  var dotsCategory = $(this);
  var dropdownCategory = dotsCategory.closest("td").find(".dropdown-category");
  dropdownCategory.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownCategory = $(".dropdown-category");
  if (!dropdownCategory.is(e.target) &&
    dropdownCategory.has(e.target).length === 0) {
    dropdownCategory.slideUp();
  }
});

// Genre - table - dropdown
$(".dotsGenre").click(function () {
  var dotsGenre = $(this);
  var dropdownGenre = dotsGenre.closest("td").find(".dropdown-genre");
  dropdownGenre.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownGenre = $(".dropdown-genre");
  if (!dropdownGenre.is(e.target) &&
    dropdownGenre.has(e.target).length === 0) {
    dropdownGenre.slideUp();
  }
});

// Publisher - table - dropdown
$(".dotsPublisher").click(function () {
  var dotsPublisher = $(this);
  var dropdownPublisher = dotsPublisher.closest("td").find(".dropdown-publisher");
  dropdownPublisher.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownPublisher = $(".dropdown-publisher");
  if (!dropdownPublisher.is(e.target) &&
    dropdownPublisher.has(e.target).length === 0) {
    dropdownPublisher.slideUp();
  }
});

// Book bind - table - dropdown
$(".dotsBookBind").click(function () {
  var dotsBookBind = $(this);
  var dropdownBookBind = dotsBookBind.closest("td").find(".dropdown-book-bind");
  dropdownBookBind.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownBookBind = $(".dropdown-book-bind");
  if (!dropdownBookBind.is(e.target) &&
    dropdownBookBind.has(e.target).length === 0) {
    dropdownBookBind.slideUp();
  }
});

// Format - table - dropdown
$(".dotsFormat").click(function () {
  var dotsFormat = $(this);
  var dropdownFormat = dotsFormat.closest("td").find(".dropdown-format");
  dropdownFormat.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownFormat = $(".dropdown-format");
  if (!dropdownFormat.is(e.target) &&
    dropdownFormat.has(e.target).length === 0) {
    dropdownFormat.slideUp();
  }
});

// Script - table - dropdown
$(".dotsScript").click(function () {
  var dotsScript = $(this);
  var dropdownScript = dotsScript.closest("td").find(".dropdown-script");
  dropdownScript.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownScript = $(".dropdown-script");
  if (!dropdownScript.is(e.target) &&
    dropdownScript.has(e.target).length === 0) {
    dropdownScript.slideUp();
  }
});

// Librarian - table - dropdown
$(".dotsLibrarian").click(function () {
  var dotsLibrarian = $(this);
  var dropdownLibrarian = dotsLibrarian.closest("td").find(".dropdown-librarian");
  dropdownLibrarian.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownLibrarian = $(".dropdown-librarian");
  if (!dropdownLibrarian.is(e.target) &&
    dropdownLibrarian.has(e.target).length === 0) {
    dropdownLibrarian.slideUp();
  }
});

// Student - table - dropdown
$(".dotsStudent").click(function () {
  var dotsStudent = $(this);
  var dropdownStudent = dotsStudent.closest("td").find(".dropdown-student");
  dropdownStudent.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudent = $(".dropdown-student");
  if (!dropdownStudent.is(e.target) &&
    dropdownStudent.has(e.target).length === 0) {
    dropdownStudent.slideUp();
  }
});

// Student - profile - dropdown
$(".dotsStudentProfile").click(function () {
  $(".dropdown-student-profile").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudentProfile = $(".dropdown-student-profile");
  if (!dropdownStudentProfile.is(e.target) &&
    dropdownStudentProfile.has(e.target).length === 0 &&
    !$(e.target).is('.dotsStudentProfile')) {
    dropdownStudentProfile.slideUp();
  }
});

// Student - profile - record - dropdown
$(".dotsStudentProfileEvidencija").click(function () {
  $(".dropdown-student-profile-evidencija").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudentProfileEvidencija = $(".dropdown-student-profile-evidencija");
  if (!dropdownStudentProfileEvidencija.is(e.target) &&
    dropdownStudentProfileEvidencija.has(e.target).length === 0 &&
    !$(e.target).is('.dotsStudentProfileEvidencija')) {
    dropdownStudentProfileEvidencija.slideUp();
  }
});

// Student - profile - vracene knjige - dropdown
$(".dotsUcenikVraceneKnjige").click(function () {
  $(".ucenik-vracene-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikVraceneKnjige = $(".ucenik-vracene-knjige");
  if (!dropdownUcenikVraceneKnjige.is(e.target) &&
    dropdownUcenikVraceneKnjige.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikVraceneKnjige')) {
    dropdownUcenikVraceneKnjige.slideUp();
  }
});

// Student - profile - knjige u prekoracenju - dropdown
$(".dotsUcenikKnjigePrekoracenje").click(function () {
  $(".ucenik-prekoracenje-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikKnjigePrekoracenje = $(".ucenik-prekoracenje-knjige");
  if (!dropdownUcenikKnjigePrekoracenje.is(e.target) &&
    dropdownUcenikKnjigePrekoracenje.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikKnjigePrekoracenje')) {
    dropdownUcenikKnjigePrekoracenje.slideUp();
  }
});

// Student - profile - aktivne knjige - dropdown
$(".dotsUcenikKnjigeAktivne").click(function () {
  $(".ucenik-aktivne-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikKnjigeAktivne = $(".ucenik-aktivne-knjige");
  if (!dropdownUcenikKnjigeAktivne.is(e.target) &&
    dropdownUcenikKnjigeAktivne.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikKnjigeAktivne')) {
    dropdownUcenikKnjigeAktivne.slideUp();
  }
});

// Student - profile - arhivirane knjige - dropdown
$(".dotsUcenikKnjigeArhivirane").click(function () {
  $(".ucenik-arhivirane-knjige").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikKnjigeArhivirane = $(".ucenik-arhivirane-knjige");
  if (!dropdownUcenikKnjigeArhivirane.is(e.target) &&
    dropdownUcenikKnjigeArhivirane.has(e.target).length === 0 &&
    !$(e.target).is('.dotsUcenikKnjigeArhivirane')) {
    dropdownUcenikKnjigeArhivirane.slideUp();
  }
});

// Student - profile - book record - dropdown
$(".dotsStudentProfileBookRecord").click(function () {
  var dotsStudentProfileBookRecord = $(this);
  var dropdownStudentProfileEvidencijaKnjige = dotsStudentProfileBookRecord.closest("td").find(".dropdown-student-profile-evidencija-knjige");
  dropdownStudentProfileEvidencijaKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownStudentProfileEvidencijaKnjige = $(".dropdown-student-profile-evidencija-knjige");
  if (!dropdownStudentProfileEvidencijaKnjige.is(e.target) &&
    dropdownStudentProfileEvidencijaKnjige.has(e.target).length === 0) {
    dropdownStudentProfileEvidencijaKnjige.slideUp();
  }
});

// Student - profile - vracene knjige tabela - dropdown
$(".dotsUcenikVraceneKnjigeTabela").click(function () {
  var dotsUcenikVraceneKnjigeTabela = $(this);
  var dropdownUcenikVraceneKnjigeTabela = dotsUcenikVraceneKnjigeTabela.closest("td").find(".ucenik-vracene-knjige-tabela");
  dropdownUcenikVraceneKnjigeTabela.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownUcenikVraceneKnjigeTabela = $(".ucenik-vracene-knjige-tabela");
  if (!dropdownUcenikVraceneKnjigeTabela.is(e.target) &&
    dropdownUcenikVraceneKnjigeTabela.has(e.target).length === 0) {
    dropdownUcenikVraceneKnjigeTabela.slideUp();
  }
});

// Student - profile - knjige u prekoracenju tabela - dropdown
$(".dotsUcenikPrekoracenjeKnjige").click(function () {
  var dotsUcenikPrekoracenjeKnjige = $(this);
  var dropdownPrekoracenjeKnjige = dotsUcenikPrekoracenjeKnjige.closest("td").find(".ucenik-prekoracenje-knjige-tabela");
  dropdownPrekoracenjeKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownPrekoracenjeKnjige = $(".ucenik-prekoracenje-knjige-tabela");
  if (!dropdownPrekoracenjeKnjige.is(e.target) &&
    dropdownPrekoracenjeKnjige.has(e.target).length === 0) {
    dropdownPrekoracenjeKnjige.slideUp();
  }
});

// Student - profile - aktivne knjige tabela - dropdown
$(".dotsUcenikAktivneKnjige").click(function () {
  var dotsUcenikAktivneKnjige = $(this);
  var dropdownAktivneKnjige = dotsUcenikAktivneKnjige.closest("td").find(".ucenik-aktivne-knjige-tabela");
  dropdownAktivneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAktivneKnjige = $(".ucenik-aktivne-knjige-tabela");
  if (!dropdownAktivneKnjige.is(e.target) &&
    dropdownAktivneKnjige.has(e.target).length === 0) {
    dropdownAktivneKnjige.slideUp();
  }
});

// Student - profile - arhivirane knjige tabela - dropdown
$(".dotsUcenikArhiviraneKnjige").click(function () {
  var dotsUcenikArhiviraneKnjige = $(this);
  var dropdownArhiviraneKnjige = dotsUcenikArhiviraneKnjige.closest("td").find(".ucenik-arhivirane-knjige-tabela");
  dropdownArhiviraneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownArhiviraneKnjige = $(".ucenik-arhivirane-knjige-tabela");
  if (!dropdownArhiviraneKnjige.is(e.target) &&
    dropdownArhiviraneKnjige.has(e.target).length === 0) {
    dropdownArhiviraneKnjige.slideUp();
  }
});

// Librarian - profile - dropdown
$(".dotsLibrarianProfile").click(function () {
  $(".dropdown-librarian-profile").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownLibrarianProfile = $(".dropdown-librarian-profile");
  if (!dropdownLibrarianProfile.is(e.target) &&
    dropdownLibrarianProfile.has(e.target).length === 0 &&
    !$(e.target).is('.dotsLibrarianProfile')) {
    dropdownLibrarianProfile.slideUp();
  }
});

// Izdate knjige - dropdown
$(".dotsIzdateKnjige").click(function () {
  var dotsIzdateKnjige = $(this);
  var dropdownIzdateKnjige = dotsIzdateKnjige.closest("td").find(".izdate-knjige");
  dropdownIzdateKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdateKnjige = $(".izdate-knjige");
  if (!dropdownIzdateKnjige.is(e.target) &&
    dropdownIzdateKnjige.has(e.target).length === 0) {
    dropdownIzdateKnjige.slideUp();
  }
});

// Vracene knjige - dropdown
$(".dotsVraceneKnjige").click(function () {
  var dotsVraceneKnjige = $(this);
  var dropdownVraceneKnjige = dotsVraceneKnjige.closest("td").find(".vracene-knjige");
  dropdownVraceneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownVraceneKnjige = $(".vracene-knjige");
  if (!dropdownVraceneKnjige.is(e.target) &&
    dropdownVraceneKnjige.has(e.target).length === 0) {
    dropdownVraceneKnjige.slideUp();
  }
});

// Knjige u prekoracenju - dropdown
$(".dotsKnjigePrekoracenje").click(function () {
  var dotsKnjigePrekoracenje = $(this);
  var dropdownKnjigePrekoracenje = dotsKnjigePrekoracenje.closest("td").find(".knjige-prekoracenje");
  dropdownKnjigePrekoracenje.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigePrekoracenje = $(".knjige-prekoracenje");
  if (!dropdownKnjigePrekoracenje.is(e.target) &&
    dropdownKnjigePrekoracenje.has(e.target).length === 0) {
    dropdownKnjigePrekoracenje.slideUp();
  }
});

// Aktivne rezervacije - dropdown
$(".dotsAktivneRezervacije").click(function () {
  var dotsAktivneRezervacije = $(this);
  var dropdownAktivneRezervacije = dotsAktivneRezervacije.closest("td").find(".aktivne-rezervacije");
  dropdownAktivneRezervacije.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAktivneRezervacije = $(".aktivne-rezervacije");
  if (!dropdownAktivneRezervacije.is(e.target) &&
    dropdownAktivneRezervacije.has(e.target).length === 0) {
    dropdownAktivneRezervacije.slideUp();
  }
});

// Arhivirane rezervacije - dropdown
$(".dotsArhiviraneRezervacije").click(function () {
  var dotsArhiviraneRezervacije = $(this);
  var dropdownArhiviraneRezervacije = dotsArhiviraneRezervacije.closest("td").find(".arhivirane-rezervacije");
  dropdownArhiviraneRezervacije.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownArhiviraneRezervacije = $(".arhivirane-rezervacije");
  if (!dropdownArhiviraneRezervacije.is(e.target) &&
    dropdownArhiviraneRezervacije.has(e.target).length === 0) {
    dropdownArhiviraneRezervacije.slideUp();
  }
});

// Autori - dropdown
$(".dotsAutori").click(function () {
  var dotsAutori = $(this);
  var dropdownAutori = dotsAutori.closest("td").find(".dropdown-autori");
  dropdownAutori.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAutori = $(".dropdown-autori");
  if (!dropdownAutori.is(e.target) &&
    dropdownAutori.has(e.target).length === 0) {
    dropdownAutori.slideUp();
  }
});

// Autori - profile - dropdown
$(".dotsAutor").click(function () {
  $(".dropdown-autor").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownAutor = $(".dropdown-autor");
  if (!dropdownAutor.is(e.target) &&
    dropdownAutor.has(e.target).length === 0 &&
    !$(e.target).is('.dotsAutor')) {
    dropdownAutor.slideUp();
  }
});

// Knjige - dropdown
$(".dotsKnjige").click(function () {
  var dotsKnjige = $(this);
  var dropdownKnjige = dotsKnjige.closest("td").find(".dropdown-knjige");
  dropdownKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjige = $(".dropdown-knjige");
  if (!dropdownKnjige.is(e.target) &&
    dropdownKnjige.has(e.target).length === 0) {
    dropdownKnjige.slideUp();
  }
});

// Knjiga - osnovni detalji - dropdown
$(".dotsKnjigaOsnovniDetalji").click(function () {
  $(".dropdown-knjiga-osnovni-detalji").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigaOsnovniDetalji = $(".dropdown-knjiga-osnovni-detalji");
  if (!dropdownKnjigaOsnovniDetalji.is(e.target) &&
    dropdownKnjigaOsnovniDetalji.has(e.target).length === 0 &&
    !$(e.target).is('.dotsKnjigaOsnovniDetalji')) {
    dropdownKnjigaOsnovniDetalji.slideUp();
  }
});

// Izdaj knjigu - dropdown
$(".dotsIzdajKnjigu").click(function () {
  $(".dropdown-izdaj-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdajKnjigu = $(".dropdown-izdaj-knjigu");
  if (!dropdownIzdajKnjigu.is(e.target) &&
    dropdownIzdajKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIzdajKnjigu')) {
    dropdownIzdajKnjigu.slideUp();
  }
});

// Izdaj knjigu error - dropdown
$(".dotsIzdajKnjiguError").click(function () {
  $(".dropdown-izdaj-knjigu-error").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdajKnjiguError = $(".dropdown-izdaj-knjigu-error");
  if (!dropdownIzdajKnjiguError.is(e.target) &&
    dropdownIzdajKnjiguError.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIzdajKnjiguError')) {
    dropdownIzdajKnjiguError.slideUp();
  }
});

// Vrati knjigu - dropdown
$(".dotsVratiKnjigu").click(function () {
  $(".dropdown-vrati-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownVratiKnjigu = $(".dropdown-vrati-knjigu");
  if (!dropdownVratiKnjigu.is(e.target) &&
    dropdownVratiKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsVratiKnjigu')) {
    dropdownVratiKnjigu.slideUp();
  }
});

// Rezervisi knjigu - dropdown
$(".dotsRezervisiKnjigu").click(function () {
  $(".dropdown-rezervisi-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownRezervisiKnjigu = $(".dropdown-rezervisi-knjigu");
  if (!dropdownRezervisiKnjigu.is(e.target) &&
    dropdownRezervisiKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsRezervisiKnjigu')) {
    dropdownRezervisiKnjigu.slideUp();
  }
});

// Otpisi knjigu - dropdown
$(".dotsOtpisiKnjigu").click(function () {
  $(".dropdown-otpisi-knjigu").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownOtpisiKnjigu = $(".dropdown-otpisi-knjigu");
  if (!dropdownOtpisiKnjigu.is(e.target) &&
    dropdownOtpisiKnjigu.has(e.target).length === 0 &&
    !$(e.target).is('.dotsOtpisiKnjigu')) {
    dropdownOtpisiKnjigu.slideUp();
  }
});

// Knjiga - specifikacija - dropdown
$(".dotsKnjigaSpecifikacija").click(function () {
  $(".dropdown-knjiga-specifikacija").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigaSpecifikacija = $(".dropdown-knjiga-specifikacija");
  if (!dropdownKnjigaSpecifikacija.is(e.target) &&
    dropdownKnjigaSpecifikacija.has(e.target).length === 0 &&
    !$(e.target).is('.dotsKnjigaSpecifikacija')) {
    dropdownKnjigaSpecifikacija.slideUp();
  }
});

// Knjiga - multimedija - dropdown
$(".dotsKnjigaMultimedija").click(function () {
  $(".dropdown-knjiga-multimedija").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownKnjigaMultimedija = $(".dropdown-knjiga-multimedija");
  if (!dropdownKnjigaMultimedija.is(e.target) &&
    dropdownKnjigaMultimedija.has(e.target).length === 0 &&
    !$(e.target).is('.dotsKnjigaMultimedija')) {
    dropdownKnjigaMultimedija.slideUp();
  }
});

// Iznajmljivanje - izdate - dropdown
$(".dotsIznajmljivanjeIzdate").click(function () {
  $(".dropdown-iznajmljivanje-izdate").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeIzdate = $(".dropdown-iznajmljivanje-izdate");
  if (!dropdownIznajmljivanjeIzdate.is(e.target) &&
    dropdownIznajmljivanjeIzdate.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeIzdate')) {
    dropdownIznajmljivanjeIzdate.slideUp();
  }
});

// Iznajmljivanje - vracene - dropdown
$(".dotsIznajmljivanjeVracene").click(function () {
  $(".dropdown-iznajmljivanje-vracene").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeVracene = $(".dropdown-iznajmljivanje-vracene");
  if (!dropdownIznajmljivanjeVracene.is(e.target) &&
    dropdownIznajmljivanjeVracene.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeVracene')) {
    dropdownIznajmljivanjeVracene.slideUp();
  }
});

// Iznajmljivanje - prekoracenje - dropdown
$(".dotsIznajmljivanjePrekoracenje").click(function () {
  $(".dropdown-iznajmljivanje-prekoracenje").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjePrekoracenje = $(".dropdown-iznajmljivanje-prekoracenje");
  if (!dropdownIznajmljivanjePrekoracenje.is(e.target) &&
    dropdownIznajmljivanjePrekoracenje.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjePrekoracenje')) {
    dropdownIznajmljivanjePrekoracenje.slideUp();
  }
});

// Iznajmljivanje - aktivne rezervacije - dropdown
$(".dotsIznajmljivanjeAktivneRezervacije").click(function () {
  $(".dropdown-iznajmljivanje-aktivne-rezervacije").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeAktivneRezervacije = $(".dropdown-iznajmljivanje-aktivne-rezervacije");
  if (!dropdownIznajmljivanjeAktivneRezervacije.is(e.target) &&
    dropdownIznajmljivanjeAktivneRezervacije.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeAktivneRezervacije')) {
    dropdownIznajmljivanjeAktivneRezervacije.slideUp();
  }
});

// Iznajmljivanje - arhivirane rezervacije - dropdown
$(".dotsIznajmljivanjeArhiviraneRezervacije").click(function () {
  $(".dropdown-iznajmljivanje-arhivirane-rezervacije").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeArhiviraneRezervacije = $(".dropdown-iznajmljivanje-arhivirane-rezervacije");
  if (!dropdownIznajmljivanjeArhiviraneRezervacije.is(e.target) &&
    dropdownIznajmljivanjeArhiviraneRezervacije.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIznajmljivanjeArhiviraneRezervacije')) {
    dropdownIznajmljivanjeArhiviraneRezervacije.slideUp();
  }
});

// Izdavanje - detalji - dropdown
$(".dotsIzdavanjeDetalji").click(function () {
  $(".dropdown-izdavanje-detalji").toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIzdavanjeDetalji = $(".dropdown-izdavanje-detalji");
  if (!dropdownIzdavanjeDetalji.is(e.target) &&
    dropdownIzdavanjeDetalji.has(e.target).length === 0 &&
    !$(e.target).is('.dotsIzdavanjeDetalji')) {
    dropdownIzdavanjeDetalji.slideUp();
  }
});

// Iznajmljivanje - izdate knjige - tabela - dropdown
$(".dotsIznajmljivanjeIzdateKnjige").click(function () {
  var dotsIznajmljivanjeIzdateKnjige = $(this);
  var dropdownIznajmljivanjeIzdateKnjige = dotsIznajmljivanjeIzdateKnjige.closest("td").find(".iznajmljivanje-izdate-knjige");
  dropdownIznajmljivanjeIzdateKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeIzdateKnjige = $(".iznajmljivanje-izdate-knjige");
  if (!dropdownIznajmljivanjeIzdateKnjige.is(e.target) &&
    dropdownIznajmljivanjeIzdateKnjige.has(e.target).length === 0) {
    dropdownIznajmljivanjeIzdateKnjige.slideUp();
  }
});

// Iznajmljivanje - vracene knjige - tabela - dropdown
$(".dotsIznajmljivanjeVraceneKnjige").click(function () {
  var dotsIznajmljivanjeVraceneKnjige = $(this);
  var dropdownIznajmljivanjeVraceneKnjige = dotsIznajmljivanjeVraceneKnjige.closest("td").find(".iznajmljivanje-vracene-knjige");
  dropdownIznajmljivanjeVraceneKnjige.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeVraceneKnjige = $(".iznajmljivanje-vracene-knjige");
  if (!dropdownIznajmljivanjeVraceneKnjige.is(e.target) &&
    dropdownIznajmljivanjeVraceneKnjige.has(e.target).length === 0) {
    dropdownIznajmljivanjeVraceneKnjige.slideUp();
  }
});

// Iznajmljivanje - knjige u prekoracenju - tabela - dropdown
$(".dotsIznajmljivanjeKnjigePrekoracenje").click(function () {
  var dotsIznajmljivanjeKnjigePrekoracenje = $(this);
  var dropdownIznajmljivanjeKnjigePrekoracenje = dotsIznajmljivanjeKnjigePrekoracenje.closest("td").find(".iznajmljivanje-knjige-prekoracenje");
  dropdownIznajmljivanjeKnjigePrekoracenje.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeKnjigePrekoracenje = $(".iznajmljivanje-knjige-prekoracenje");
  if (!dropdownIznajmljivanjeKnjigePrekoracenje.is(e.target) &&
    dropdownIznajmljivanjeKnjigePrekoracenje.has(e.target).length === 0) {
    dropdownIznajmljivanjeKnjigePrekoracenje.slideUp();
  }
});

// Iznajmljivanje - aktivne rezervacije - tabela - dropdown
$(".dotsIznajmljivanjeAktivneRezervacijeTabela").click(function () {
  var dotsIznajmljivanjeAktivneRezervacijeTabela = $(this);
  var dropdownIznajmljivanjeAktivneRezervacijeTabela = dotsIznajmljivanjeAktivneRezervacijeTabela.closest("td").find(".iznajmljivanje-aktivne-rezervacije");
  dropdownIznajmljivanjeAktivneRezervacijeTabela.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeAktivneRezervacijeTabela = $(".iznajmljivanje-aktivne-rezervacije");
  if (!dropdownIznajmljivanjeAktivneRezervacijeTabela.is(e.target) &&
    dropdownIznajmljivanjeAktivneRezervacijeTabela.has(e.target).length === 0) {
    dropdownIznajmljivanjeAktivneRezervacijeTabela.slideUp();
  }
});

// Iznajmljivanje - aktivne rezervacije - tabela - dropdown
$(".dotsIznajmljivanjeArhiviraneRezervacijeTabela").click(function () {
  var dotsIznajmljivanjeArhiviraneRezervacijeTabela = $(this);
  var dropdownIznajmljivanjeArhiviraneRezervacijeTabela = dotsIznajmljivanjeArhiviraneRezervacijeTabela.closest("td").find(".iznajmljivanje-arhivirane-rezervacije");
  dropdownIznajmljivanjeArhiviraneRezervacijeTabela.toggle();
})

$(document).on('mouseup', function (e) {
  var dropdownIznajmljivanjeArhiviraneRezervacijeTabela = $(".iznajmljivanje-arhivirane-rezervacije");
  if (!dropdownIznajmljivanjeArhiviraneRezervacijeTabela.is(e.target) &&
    dropdownIznajmljivanjeArhiviraneRezervacijeTabela.has(e.target).length === 0) {
    dropdownIznajmljivanjeArhiviraneRezervacijeTabela.slideUp();
  }
});

//click on one and check all checkboxes(evidencijaKnjiga.php)
$('.checkAll').click(function () {
  if ($(this).is(':checked')) {
    $('.form-checkbox').prop('checked', true);
    $('tr').addClass('bg-gray-200');
    $('tr').children().eq(1).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fa fa-trash ml-4"></i>  Izbrisi knjigu</a>')
    $('tr').children().eq(2).html('')
    $('tr').children().eq(3).html('')
    $('tr').children().eq(4).html('')
    $('tr').children().eq(5).html('')
    $('tr').children().eq(6).html('')
    $('tr').children().eq(7).html('')
    $('tr').children().eq(8).html('')
  } else {
    $('.form-checkbox').prop('checked', false);
    $('tr').removeClass('bg-gray-200');
    $('tr').children().eq(1).html('Naziv knjige<a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>')
    $('tr').children().eq(2).html('Autor<i class="ml-2 fas fa-filter"></i><div id="autoriDropdown" class="autoriMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset"><li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"><input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search" onkeyup="filterFunction(" searchAutori ", "autoriDropdown ")" id="searchAutori"><br> <button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900"><i class="fas fa-search"></i></button></li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 2 </p>  </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg>  </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 3  </p> </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic 4  </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /></svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 5 </p> </li><li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"><input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 6 </p> </li> </div></ul><div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">  Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a> <a href="#"  class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]"> Ponisti <i class="fas fa-times ml-[4px]"></i> </a> </div></div>')
    $('tr').children().eq(3).html('Kategorija<i class="ml-2 fas fa-filter"></i><div id="kategorijeDropdown" class="kategorijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset">  <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"> <input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search"  onkeyup="filterFunction("searchKategorije", "kategorijeDropdown")"  id="searchKategorije"><br><button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">  <i class="fas fa-search"></i> </button> </li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />   </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romani </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Udzbenici </p></li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Drame </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg>  </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Naucna fantastika </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romedije  </p>  </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"   viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Trileri </p> </li> </div> </ul> <div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]"> Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a>  <a href="#" class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">  Ponisti <i class="fas fa-times ml-[4px]"></i> </a></div></div>')
    $('tr').children().eq(4).html('Na raspolaganju')
    $('tr').children().eq(5).html('Rezervisano')
    $('tr').children().eq(6).html('Izdato')
    $('tr').children().eq(7).html('U prekoracenju')
    $('tr').children().eq(8).html('Ukupna kolicina')
  }
});
$('.checkOthers').change(function () {
  var checked = $('#myTable').find(':checked').length;
  if (checked == 1) {
    $(this).addClass('bg-gray-200');
    $('tr').children().eq(1).html('<a class="text-blue-800" href="knjigaOsnovniDetalji.php"><i class="far fa-copy"></i>  Pogledaj detalje</a>')
    $('tr').children().eq(2).html('<a class="text-blue-800" href="editKnjiga.php.php"><i class="far fa-copy"></i>  Izmjeni knjigu</a>')
    $('tr').children().eq(3).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fas fa-level-up-alt ml-4"></i>  Otpisi knjigu</a>')
    $('tr').children().eq(4).html('<a class="text-blue-800" href="izdajKnjigu.php"><i class="far fa-hand-scissors"></i>  Izdaj knjigu</a>')
    $('tr').children().eq(5).html('<a class="text-blue-800" href="vratiKnjigu.php"><i class="fas fa-redo-alt"></i>  Vrati knjigu</a>')
    $('tr').children().eq(6).html('<a class="text-blue-800" href="otpisiKnjigu.php"><i class="far fa-calendar-check"></i>  Rezervisi knjigu</a>')
    $('tr').children().eq(7).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fa fa-trash ml-4"></i>  Izbrisi knjigu</a>')
    $('tr').children().eq(8).html('')
  } else if (checked >= 2) {
    $(this).addClass('bg-gray-200');
    $('tr').children().eq(1).html('<a class="text-blue-800 border-l-2 border-gray-200" href="otpisiKnjigu.php"><i class="fa fa-trash ml-4"></i>  Izbrisi knjigu</a>')
    $('tr').children().eq(2).html('')
    $('tr').children().eq(3).html('')
    $('tr').children().eq(4).html('')
    $('tr').children().eq(5).html('')
    $('tr').children().eq(6).html('')
    $('tr').children().eq(7).html('')
    $('tr').children().eq(8).html('')
  } else {
    $('.form-checkbox').prop('checked', false);
    $('tr').removeClass('bg-gray-200');
    $('tr').children().eq(1).html('Naziv knjige<a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>')
    $('tr').children().eq(2).html('Autor<i class="ml-2 fas fa-filter"></i><div id="autoriDropdown" class="autoriMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset"><li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"><input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search" onkeyup="filterFunction(" searchAutori ", "autoriDropdown ")" id="searchAutori"><br> <button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900"><i class="fas fa-search"></i></button></li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 2 </p>  </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg>  </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 3  </p> </li>  <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Autor Autorovic 4  </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /></svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 5 </p> </li><li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"><input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg> </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Autor Autorovic 6 </p> </li> </div></ul><div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">  Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a> <a href="#"  class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]"> Ponisti <i class="fas fa-times ml-[4px]"></i> </a> </div></div>')
    $('tr').children().eq(3).html('Kategorija<i class="ml-2 fas fa-filter"></i><div id="kategorijeDropdown" class="kategorijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300"><ul class="border-b-2 border-gray-300 list-reset">  <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300"> <input class="w-full h-10 px-2 border-2 rounded focus:outline-none" placeholder="Search"  onkeyup="filterFunction("searchKategorije", "kategorijeDropdown")"  id="searchKategorije"><br><button class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">  <i class="fas fa-search"></i> </button> </li><div class="h-[200px] scroll font-normal"> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />   </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romani </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div  class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current" viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Udzbenici </p></li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0"> <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label>  <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Drame </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200"> <label class="flex items-center justify-start">  <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />  </svg>  </div> </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600"> Naucna fantastika </p> </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500"> <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"  viewBox="0 0 20 20">  <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div> </label> <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Romedije  </p>  </li> <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">  <label class="flex items-center justify-start"> <div   class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">  <input type="checkbox" class="absolute opacity-0">  <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"   viewBox="0 0 20 20"> <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" /> </svg> </div>  </label> <p  class="block p-2 text-black cursor-pointer group-hover:text-blue-600">  Trileri </p> </li> </div> </ul> <div class="flex pt-[10px] text-white "> <a href="#" class="py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]"> Sacuvaj <i class="fas fa-check ml-[4px]"></i> </a>  <a href="#" class="ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">  Ponisti <i class="fas fa-times ml-[4px]"></i> </a></div></div>')
    $('tr').children().eq(4).html('Na raspolaganju')
    $('tr').children().eq(5).html('Rezervisano')
    $('tr').children().eq(6).html('Izdato')
    $('tr').children().eq(7).html('U prekoracenju')
    $('tr').children().eq(8).html('Ukupna kolicina')
  }
});
// ======================================
// ===============BOOKS==================
// ======================================

let books = document.getElementById("books")
let showBooks = document.getElementById("showBooks")
let hideBooks = document.getElementById("hideBooks")

showBooks.addEventListener("click", () => {
    books.style.display = "block";
})

hideBooks.addEventListener("click", () => {
    books.style.display = "none";
})

// ======================================
// ===============AUTHORS================
// ======================================

let authors = document.getElementById("authors")
let showAuthors = document.getElementById("showAuthors")
let hideAuthors = document.getElementById("hideAuthors")

showAuthors.addEventListener("click", () => {
    authors.style.display = "block";
})

hideAuthors.addEventListener("click", () => {
    authors.style.display = "none";
})

// ======================================
// ===============Genres================
// ======================================

let genres = document.getElementById("genres")
let showGenres = document.getElementById("showGenres")
let hideGenres = document.getElementById("hideGenres")

showGenres.addEventListener("click", () => {
    genres.style.display = "block";
})

hideGenres.addEventListener("click", () => {
    genres.style.display = "none";
})
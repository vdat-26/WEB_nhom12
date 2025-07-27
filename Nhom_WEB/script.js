function searchBooks() {
  let input = document.getElementById("searchInput").value.toLowerCase();
  let books = document.querySelectorAll(".book");

  books.forEach(function(book) {
    let title = book.querySelector(".book-title").textContent.toLowerCase();
    if (title.includes(input)) {
      book.style.display = "block";
    } else {
      book.style.display = "none";
    }
  });
}

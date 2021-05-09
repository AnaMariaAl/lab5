const oneTable = document.querySelector(".table-body-one");
const input = document.querySelector("#getPost");

const fetchPost = (e) => {
  let inputValue = e.target.value;

  if (e.keyCode === 13) {
    fetch(`http://localhost/lab5/api/post/read_single.php?id=${inputValue}`)
      .then((res) => res.json())
      .then((res) => {
        console.log(res);
        let row = document.createElement("tr");

        let id = document.createElement("td");
        let title = document.createElement("td");
        let author = document.createElement("td");
        let body = document.createElement("td");
        let category = document.createElement("td");

        id.innerHTML = `${res.id}`;
        title.innerHTML = `${res.title}`;
        author.innerHTML = `${res.author}`;
        body.innerHTML = `${res.body}`;
        category.innerHTML = `${res.category_id}`;

        row.append(id, title, author, body, category);
        oneTable.appendChild(row);
      })
      .catch((err) => console.log(err));
  }
};

input.addEventListener("keyup", (e) => fetchPost(e));

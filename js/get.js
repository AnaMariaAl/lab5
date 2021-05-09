const submit = document.getElementById("submit-all");
const deleteBtn = document.getElementById("delete-all");
const table = document.querySelector(".table-body");

let data = [];
const fetchPosts = () => {
  fetch("http://localhost/lab5/api/post/read.php")
    .then((res) => res.json())
    .then((res) => {
      console.log(typeof res);
      data = res;
      console.log(data);
      return res;
    })
    .then((res) => {
      data.map((post) => {
        let row = document.createElement("tr");
        row.classList.add("table-rows");

        let id = document.createElement("td");
        let title = document.createElement("td");
        let author = document.createElement("td");
        let body = document.createElement("td");
        let category = document.createElement("td");

        id.innerHTML = `${post.id}`;
        title.innerHTML = `${post.title}`;
        author.innerHTML = `${post.author}`;
        body.innerHTML = `${post.body}`;
        category.innerHTML = `${post.category_id}`;

        row.append(id, title, author, body, category);
        table.appendChild(row);
      });
    })
    .catch((err) => console.log(err));
};

const deletePosts = () => {
  const tableChilds = Array.from(table.children);
  console.log(tableChilds);

  tableChilds.forEach((row) => {
    if (row.classList.contains("table-rows")) {
      table.removeChild(row);
    }
  });
};

submit.addEventListener("click", fetchPosts);
deleteBtn.addEventListener("click", deletePosts);

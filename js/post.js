const form = document.querySelector("#post-form");

const postFormChilds = Array.from(form.children);
const inputs = postFormChilds.filter((el) => el.nodeName === "INPUT");
console.log(inputs);

const makePost = (e) => {
  e.preventDefault();

  const titleInput = inputs[0].value;
  const bodyInput = inputs[1].value;
  const authorInput = inputs[2].value;
  const categoryInput = inputs[3].value;

  console.log(categoryInput);

  const data = {
    title: titleInput,
    body: bodyInput,
    author: authorInput,
    category_id: categoryInput,
  };

  console.log(JSON.stringify(data));
  fetch("http://localhost/lab5/api/post/create.php", {
    method: "POST",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => console.log(res))
    .catch((err) => console.log(err));
};

form.addEventListener("submit", (e) => makePost(e));

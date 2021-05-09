const updateForm = document.querySelector("#update-form");

const postFormChilds = Array.from(updateForm.children);
const inputs = postFormChilds.filter((el) => el.nodeName === "INPUT");

const makePost = (e) => {
  e.preventDefault();

  const authorInput = inputs[0].value;
  const titleInput = inputs[1].value;
  const bodyInput = inputs[2].value;
  const categoryInput = inputs[3].value;

  console.log(categoryInput);

  const data = {
    title: titleInput,
    body: bodyInput,
    author: authorInput,
    category_id: categoryInput,
  };

  console.log(JSON.stringify(data));
  fetch("http://localhost/lab5/api/post/update.php", {
    method: "PUT",
    headers: {
      "Content-type": "application/json",
    },
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => console.log(res))
    .catch((err) => console.log(err));
};

updateForm.addEventListener("submit", (e) => makePost(e));

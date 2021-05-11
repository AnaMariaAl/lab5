const updateForm = document.querySelector("#update-form");

const postFormChilds = Array.from(updateForm.children);
const inputs = postFormChilds.filter((el) => el.nodeName === "INPUT");
console.log(inputs);

const makeCar = (e) => {
  e.preventDefault();

  const brandInput = inputs[0].value;
  const modelInput = inputs[1].value;
  const yearInput = inputs[2].value;

  const data = {
    brand: brandInput,
    model: modelInput,
    year: yearInput,
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

updateForm.addEventListener("submit", (e) => makeCar(e));

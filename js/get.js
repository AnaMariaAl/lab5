const submit = document.getElementById("submit-all");
const deleteBtn = document.getElementById("delete-all");
const table = document.querySelector(".table-body");

let data = [];
const fetchCars = () => {
  fetch("http://localhost/lab5/api/post/read.php")
    .then((res) => res.json())
    .then((res) => {
      console.log(typeof res);
      data = res;
      console.log(data);
      return res;
    })
    .then((res) => {
      data.map((car) => {
        let row = document.createElement("tr");
        row.classList.add("table-rows");

        let id = document.createElement("td");
        let brand = document.createElement("td");
        let model = document.createElement("td");
        let year = document.createElement("td");

        id.innerHTML = `${car.id}`;
        brand.innerHTML = `${car.brand}`;
        model.innerHTML = `${car.model}`;
        year.innerHTML = `${car.year}`;

        row.append(id, brand, model, year);
        table.appendChild(row);
      });
    })
    .catch((err) => console.log(err));
};

const deleteCars = () => {
  const tableChilds = Array.from(table.children);
  console.log(tableChilds);

  tableChilds.forEach((row) => {
    if (row.classList.contains("table-rows")) {
      table.removeChild(row);
    }
  });
};

submit.addEventListener("click", fetchCars);
deleteBtn.addEventListener("click", deleteCars);

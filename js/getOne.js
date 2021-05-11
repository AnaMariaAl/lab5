const oneTable = document.querySelector(".table-body-one");
const input = document.querySelector("#getPost");

const fetchCar = (e) => {
  let inputValue = e.target.value;

  if (e.keyCode === 13) {
    fetch(`http://localhost/lab5/api/post/read_single.php?id=${inputValue}`)
      .then((res) => res.json())
      .then((res) => {
        console.log(res);
        let row = document.createElement("tr");

        let id = document.createElement("td");
        let brand = document.createElement("td");
        let model = document.createElement("td");
        let year = document.createElement("td");

        id.innerHTML = `${res.id}`;
        brand.innerHTML = `${res.brand}`;
        model.innerHTML = `${res.model}`;
        year.innerHTML = `${res.year}`;

        row.append(id, brand, model, year);
        oneTable.appendChild(row);
      })
      .catch((err) => console.log(err));
  }
};

input.addEventListener("keyup", (e) => fetchCar(e));

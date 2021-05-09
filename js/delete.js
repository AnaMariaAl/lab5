const deleteInput = document.getElementById("delete-post");

const deletePost = (e) => {
  const inputValue = deleteInput.value;

  const body = {
    id: inputValue,
  };

  if (e.keyCode === 13) {
    fetch("http://localhost/lab5/api/post/delete.php", {
      method: "DELETE",
      headers: {
        "Content-type": "application/json",
      },
      body: JSON.stringify(body),
    })
      .then((res) => console.log(res.json()))
      .then((res) => {
        let deleteContainer = document.getElementById("delete-container");
        let successMessage = document.createElement("h1");

        successMessage.innerHTML = "Deletion successful";
        successMessage.classList.add("btn");
        successMessage.classList.add("btn-success");
        successMessage.id = "success-deletion";
        deleteContainer.appendChild(successMessage);

        setTimeout(() => {
          let btn = document.querySelector(".btn-success");
          deleteContainer.removeChild(btn);
          // btn.remove();
        }, 4000);
      })
      .catch((err) => console.log(err));
  }
};

deleteInput.addEventListener("keyup", (e) => deletePost(e));

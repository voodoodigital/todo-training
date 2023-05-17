document.addEventListener("DOMContentLoaded", request);

function request() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      console.log(response);
      var responseArray = JSON.parse(response);
      var container = document.getElementById("todoContainer");
      for (let index = 0; index < responseArray.length; index++) {
        var dataObject = responseArray[index];

        container.innerHTML += `
                <div class=" col-6 shadow rounded-4 offset-3 p-3 my-2 bg-danger " style="max-height: 100px;">
                    <div class="h-100 text-white fw-bold justify-content-between d-flex">
                      <div  class=" h-100 overflow-auto">${dataObject.todo}</div>
                      <div class="px-3">${dataObject.time}</div>
                    </div>
                </div>
            `;
      }
    }
  };
  request.open(
    "GET",
    "http://localhost/voodooDigital/study/todo-training/api/todoReadProcess.php",
    true
  );
  request.send();
}

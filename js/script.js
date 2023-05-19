document.addEventListener("DOMContentLoaded", request);

const ROOT_URL = "http://localhost/abc/Voodoo/todo-training/";//Shenal
// const ROOT_URL = "http://localhost/abc/Voodoo/todo-training/";//Janith

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
    ROOT_URL+"api/todoReadProcess.php",
    true
  );
  request.send();
};


document.getElementById("todoAdd").addEventListener("click", submitData);

function submitData() {
  var todo = document.getElementById('todo').value;
  var date = document.getElementById('date').value;
  var time = document.getElementById('time').value;

  var todoData = {
    todo: todo,
    date: date,
    time: time
  };

  requestTodoAdd(todoData);
};

function requestTodoAdd() {
  var request = new XMLHttpRequest();
  request.onreadystatechange= function () {
    if (request.readyState==4) {
      var response= request.responseText;
      var responseObject= JSON.parse(response);
      if (responseObject.status=="success") {
        alert("Inserted");
        request();
      }
    };
  };

  var insertTodo = JSON.stringify(todoData);
  request.open("POST", ROOT_URL+"api/todoAddProcess.php", true);
  request.send();

};
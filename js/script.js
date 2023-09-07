document.addEventListener("DOMContentLoaded", todoLoader);

const ROOT_URL = "http://localhost/abc/Voodoo/todo-training/";//Shenal
// const ROOT_URL = "http://localhost/voodooDigital/study/todo-training/"; //Janith
// const ROOT_URL = "http://localhost/todo-training/"; //kavindu

function todoLoader() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      var responseArray = JSON.parse(response);
      var container = document.getElementById("todoContainer");

      container.innerHTML = "";
      for (let index = 0; index < responseArray.length; index++) {
        var dataObject = responseArray[index];

        var checkedStates = "";
        if (dataObject.status_id == 1) {
          checkedStates = "checked";
        }

        container.innerHTML += `
                <div class=" col-6 shadow rounded-4 offset-3 p-3 my-2 bg-danger " style="max-height: 100px;">
                    <div class="h-100 text-white fw-bold justify-content-between d-flex">
                      <div  class=" h-100 overflow-auto">${dataObject.todo}</div>
                      <div class="px-3">${dataObject.time}</div>

                         
           
                      <div class="row">
                      <div class="col-12 d-flex justify-content-end align-items-end">
                          <div class="form-check form-switch">
                              <input id="${dataObject.id}" onchange="statusChanger(event);" class="form-check-input" type="checkbox" role="switch" id="IstaskComplete" ${checkedStates}>
                          </div>
      
                      </div>
                  </div>
          
          
                    </div>
                </div>
            `;
      }
    }
  };
  request.open("GET", ROOT_URL + "api/todoReadProcess.php", true);
  request.send();
}

document.getElementById("todoAdd").addEventListener("click", submitData);

function submitData() {
  var todo = document.getElementById("todo").value;
  var date = document.getElementById("date").value;
  var time = document.getElementById("time").value;

  var todoData = {
    todo: todo,
    date: date,
    time: time,
  };

  requestTodoAdd(todoData);
}

function requestTodoAdd(todoData) {
  var insertTodoJson = JSON.stringify(todoData);

  var form = new FormData();
  form.append("insertTodo", insertTodoJson);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      var responseObject = JSON.parse(response);
      if (responseObject.status == "success") {
        alert("Inserted");
        todoLoader();
      } else {
        alert(responseObject.error);
      }
    }
  };

  request.open("POST", ROOT_URL + "api/todoInsertProccess.php", true);
  request.send(form);
}

function statusChanger(event) {
  var status_id = event.target.checked ? 1 : 0;
  var requestData = { todo_id: event.target.id, todo_status_id: status_id };

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      console.log(response);
    }
  };

  request.open(
    "GET",

    ROOT_URL +
      "api/todoStatusChangeProcess.php?statusChangeData=" +
      JSON.stringify(requestData),

    true
  );
  request.send();
}

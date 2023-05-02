document.addEventListener("DOMContentLoaded", request);

function request() {
  // var request = new XMLHttpRequest();
  // request.onreadystatechange = function () {
  //   if (request.readyState == 4) {
  //     var response = request.responseText;
  //     var responseArray = JSON.parse(response);
  //     var container = document.getElementById("todoContainer");
  //     for (let index = 0; index < responseArray.length; index++) {
  //       var dataObject = responseArray[index];

  //       container.innerHTML += `
  //               <div class="col-4 rounded-4 offset-4 p-3 my-2 bg-danger ">
  //               <div class="w-100 justify-content-between d-flex">
  //                   <div>${dataObject.title}</div>
  //                   <div>${dataObject.datetime}</div>
  //               </div>
  //               </div>
  //           `;
  //     }
  //   }
  // };
  // request.open("GET", "api/apiReadProcess.php", true);
  // request.send();

  // test
  var responseArray = [
    {
      title: "title",
      datetime: "123123",
    },
  ];
  var container = document.getElementById("todoContainer");
  for (let index = 0; index < responseArray.length; index++) {
    var dataObject = responseArray[index];

    container.innerHTML += `
                <div class=" col-6 shadow rounded-4 offset-3 p-3 my-2 bg-danger " style="max-height: 100px;">
                    <div class="h-100 text-white fw-bold justify-content-between d-flex">
                      <div  class=" h-100 overflow-auto">${dataObject.title}</div>
                      <div class="px-3">${dataObject.datetime}</div>
                    </div>
                </div>
            `;
  }
}

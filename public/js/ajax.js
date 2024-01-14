var searchinput = document.querySelector("#searchResults");
var boxsearch = document.querySelector(".wrapper-box");
var noresult=document.querySelector(".wrapper-noresutl")
searchinput.addEventListener("input", () => {
  let xml = new XMLHttpRequest();
  let searchvalue = searchinput.value;

  if (searchvalue === "") {
    boxsearch.innerHTML = "";
  } else {
    xml.onreadystatechange = function () {
      if (this.readyState === 4) {
        if (this.status === 200) {
          let response = JSON.parse(this.response);

          console.log(response);

          if (response && response.length > 0) {
            boxsearch.innerHTML = `
            ${response
              .map(
                (responseData) => `
                    <div onclick="single(${responseData.id})" class=" card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="http://localhost/wikie/public/img/${responseData.Image}" class="img-fluid rounded-start" alt="Image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">${responseData.title}</h5>
                                    <a href="">
                                    <h4 class="card-text">${responseData.Categorie}</h4>
                                  </a>                                  <span class="card-text">${responseData.Date_Create}</span>
                                   
                                    <p class="card-text"><small class="text-muted">${responseData.Tags}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                `
              )
              .join("")}
        `
          } else if(response.length === 0){
            boxsearch.innerHTML = "";
            // noresult.style.display='block';
          }
        }
      }
    };

    xml.open("POST", "http://localhost/wikie/pages/search", true);

    let data = {
      search: searchvalue,
    };
    data = JSON.stringify(data);
    console.log(data);
    xml.send(data);
  }
});
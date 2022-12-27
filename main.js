const qId = document.getElementById("qId");
const quote = document.querySelector("q");
const btn = document.getElementById("bttnn");

// window.onload(gen());
btn.addEventListener("click", gen);

function gen() {
  fetch("https://api.adviceslip.com/advice")
    .then(function (res) {
      console.log("fun");
      console.log(res);
      let data = res.json();
      console.log(data);
      return data;
    })
    .then(function (data) {
      console.log(data);
      quote.innerHTML = data.slip.advice;
      qId.innerHTML = data.slip.id;
      console.log("done");
    })
    .catch((error) => console.log(error));
}

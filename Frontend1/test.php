<!DOCTYPE html>
<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div class="container mt-3">
  <h2>Button Styles</h2>
  <button type="button" class="btn">Basic</button>
  <button type="button" class="btn btn-primary">Primary</button>
  <button type="button" class="btn btn-secondary">Secondary</button>
  <button type="button" class="btn btn-success">Success</button>
  <button type="button" class="btn btn-info">Info</button>
  <button type="button" class="btn btn-warning">Warning</button>
  <button type="button" class="btn btn-danger">Danger</button>
  <button type="button" class="btn btn-dark">Dark</button>
  <button type="button" class="btn btn-light">Light</button>
  <button type="button" class="btn btn-link">Link</button>      
</div>

<!-- <h2>What Can JavaScript Do?</h2> -->

<!-- <p id="demo">JavaScript can change HTML content.</p>

<button type="button" onclick='recognition.start();'>Click Me!</button>

<div class = "texts">
  <p>Test</p>
</div> -->

<!-- <button id="btn">Speak</button> -->

</body>

<script>

document.getElementById("btn")
.addEventListener("click", () => {

  var msg = "Reservoir";
  const utterance = new SpeechSynthesisUtterance(msg);

  utterance.pitch = 1;
  utterance.rate = 0.5;
  utterance.volume = 1;
  speechSynthesis.speak(utterance)

})

</script>


<!-- <script>

  const texts = document.querySelector('.texts');

  window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

  const recognition = new window.SpeechRecognition();
  recognition.interimResults = true;




  let p = document.createElement('p');

  let x = document.createElement('p');

  recognition.addEventListener('result', (e) => {

    const text = Array.from(e.results)
      .map(result => result[0])
      .map(result => result.transcript)
      .join('');

    p.innerText = text;
    texts.appendChild(p);

    console.log(text);

    if (text.includes("reservoir"))
    {

      x.innerText = "Correct";

      document.body.appendChild(x);
    }



  })


  // recognition.start();






</script> -->
</html>
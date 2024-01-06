<!DOCTYPE html>
<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<style>


</style>
</head>

<body>

</body>

<script>



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
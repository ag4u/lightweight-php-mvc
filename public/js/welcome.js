const SETTINGS = {
  'endpoint': '/api',
};

let result = {
  pointer: 0,
  text: '',
};

const linkButtons = () => {
  document.querySelector('button[data-action="reverse"]')
  .addEventListener('click', onButtonReverse);

  document.querySelector('button[data-action="reload"]')
  .addEventListener('click', () => location.reload());
};

const blinkCursor = () => {
  const cursor = document.querySelector('#cursor');

  window.setInterval(
    () => cursor.classList.toggle('hidden'),
    400
  );
};

const onButtonReverse = () => {
  const headline = document.querySelector('h1').textContent;
  const greeting = headline.match(/:\s(.*)\s\*/)[1];

  postData(
    '/reverse',
    {text: greeting}
  ).then((data) => {
    result.pointer = 0;
    result.text = 'response from server: ' + greeting + ' -> ' + data.result;
  });
};

const showNextResultChar = () => {
  result.pointer++;

  document.querySelector('#result').textContent = result.text.substr(0, result.pointer);
}

const postData = (path, data) => {
  return new Promise(resolve => {
    fetch(
      SETTINGS.endpoint + path, {
        headers: {'Content-Type': 'application/json'},
        method: 'POST',
        body: JSON.stringify(data),
      }
    )
    .then(response => response.json())
    .then(data => resolve(data));
  });
};

linkButtons();
blinkCursor();

window.setInterval(showNextResultChar, 100);

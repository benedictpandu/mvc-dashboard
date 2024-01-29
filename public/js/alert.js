function delay(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}
async function dismissAlert() {
  await delay(4000);
  var dismissElement = document.getElementById('dismiss-button');
  if (dismissElement) {
      // Simulate a click on the button
      dismissElement.click();
  }
}
dismissAlert()
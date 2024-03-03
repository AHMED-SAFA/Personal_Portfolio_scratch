// JavaScript to handle the download CV button click
document.getElementById("dwbtn").addEventListener("click", function () {
  // Specify the URL of your CV file here
  var cvUrl = 'docs/cv.pdf';

  // Create an anchor element
  var link = document.createElement("a");
  link.href = cvUrl;
  link.download = "Ahmed_CV.pdf"; // Specify the filename for the downloaded file
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});

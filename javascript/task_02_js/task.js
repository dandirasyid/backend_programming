/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
  return new Promise((resolve) => {
    setTimeout(() => {
      console.log("Download selesai");
      resolve(result);
    },3000);
  });
};

/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
 */

const download = (callShowDownload) => {
  return new Promise((resolve) =>{
    setTimeout(() => {
      console.log("Hasil Download : " + callShowDownload);
      resolve(callShowDownload);
    });
  });
};

const main = () => {
  showDownload("windows-10.exe")
    .then((res) => {
      return download(res);
    });
};

main();

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */
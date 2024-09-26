const resultBox = document.querySelector(".result-box");
console.log(resultBox);
const inputBox = document.getElementById("input-box");
console.log(inputBox);
// console.log(customers);
// console.log(customers[0].email);

const email = [];
//store semua email yang ada di database
customers.forEach(customer => {
  email.push(customer.email);
});
console.log(email);
console.log("");
console.log(typeof email[0]);


inputBox.onkeyup = function()
{
  let result = [];
  let input = inputBox.value;
  if(input.length) {
    result = email.filter((keyword)=>{
      return keyword.includes(input); //ini untuk filter result yang sesuai (ini case sensitive)
      // keyword.toLowerCase().includes(input.toLowerCase()); //untuk yang ga case sensitif
    });
    console.log(result);
  }
  display(result); //panggil function result setiap typing
  
  //ini kalau diilangin misal udah kita search dan pilih, nanti pas kita klik lagi search barnya akan muncul kayak baris (code dibawah untuk ilanginnya)
  if(!result.length)
    {
      resultBox.innerHTML='';
    }
}

//function untuk muncullin hasil search
function display(result) 
{
  const content = result.map((list)=>{
    return "<li onclick=selectInput(this)>" + list + "</li>"
  })
  resultBox.innerHTML = "<ul>" + content.join('') + "</ul>" //content.join('') untuk ilangin koma dari hasil result.map-nya
}

function selectInput(list)
{
  inputBox.value = list.innerHTML;
  resultBox.innerHTML = '';
}

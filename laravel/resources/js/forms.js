const button = document.querySelector(".button");
const input = document.querySelectorAll(".input");

button.addEventListener("click",(ev)=>{
    input.forEach((inp)=>{
    if(inp.value == ''){
inp.classList.add("active")
inp.placeholder = 'campo vazio'
ev.preventDefault()
        }
    })
})
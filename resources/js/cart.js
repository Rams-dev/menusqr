let url = "http://localhost:8000"
let cartForm = document.querySelectorAll('.cartForm')
let modalContent = document.getElementById('modalgetUser')
let cancelbutton = document.querySelector('.cancel')

function getlocalStorage(){
    return localStorage.getItem('cart')

}

function seTlocalStorage(data){

    return localStorage.setItem("cart",data)
    
}

function removelocalStorage(){
    localStorage.removeItem('cart')
    
}

cancelbutton.addEventListener('click',function(){
    modalContent.style.display="none"
})

function cartExist(){
    return fetch(`${url}/api/carta/cart/cartExist`)
    // .then(res => console.log(res))
    .then(res => res.json())
    .then(data =>{
        return data
    } )
}

function getNameAndTable(){
    modalContent.style.display = 'block'
}

cartForm.forEach(element => {
    element.addEventListener('submit',function(e){
        e.preventDefault()
        if(getlocalStorage()){

        }
        let formData = new FormData(element);
        cartExist().then(res =>{
            if(res){
                addProduct(formData)
            }else{
                getNameAndTable()
            }
        })    
    })
});


import { FETCH } from "./fetch.js";
class SETTINGS extends FETCH {
 constructor(){
     super(),
     this.picform = document.getElementById('picform');
     this.picbtn = document.getElementById('imgsubmit');
    //  this.quoteform = document.getElementById('picform');
    //  this.quotebtn = document.getElementById('imgsubmit');
    //  this.phoneform = document.getElementById('picform');
    //  this.phonebtn = document.getElementById('imgsubmit');
     
 }
 listen(){
     this.picform.addEventListener('submit',e =>{
         e.preventDefault();
         this.picbtn.innerHTML = "Uploading Image ..";
         const formdata = new FormData(this.picform);
         super.postText('includes/insertfile.php',formdata).then(
             res=> {
                this.picbtn.innerHTML = "Images Uploaded Successfully";
                this.picform.reset();
                setTimeout(() => {
                    this.picbtn.innerHTML = "Upload Image";
                }, 2000);

                
             }
         ).catch(
             error=>{
                 console.log(error); 
             }
         )
     })


 }
}

const settings = new SETTINGS;
settings.listen()
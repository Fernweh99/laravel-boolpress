const preview = document.getElementById('preview');
const field = document.getElementById('image');
const placeholder = 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930'

field.addEventListener('input', () => {

  if(field.files && field.files[0]){
    let reader = new FileReader();
    reader.readAsDataURL(field.files[0]);
    reader.onload = e => {
      preview.src = e.target.result;
    }
  }else preview.src = placeholder;
})
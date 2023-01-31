
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    
    const dropZoneElement = inputElement.closest(".drop-zone");
    
    dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
    });
    
    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {                        

            if( inputElement.files[0].type != "application/pdf"){
                alert("الرجاء إرفاق كتب من نوع PDF1");
                return;
            }else{
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }

            
        }
    });
    
    dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });
    
    ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });
    
    dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();
        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            
            if( e.dataTransfer.files[0].type == "application/pdf"){
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }else{
                alert("الرجاء إرفاق كتب من نوع PDF1");
            }
        }
        dropZoneElement.classList.remove("drop-zone--over");
    });

});

function updateThumbnail(dropZoneElement, file) {

    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
    
    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
    }

    thumbnailElement.dataset.label = file.name;
    // Show thumbnail for image files

    if(file.type != "application/pdf"){
        alert("الرجاء إرفاق كتب من نوع PDF2");
    }

    /*if (file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
    } else {
        thumbnailElement.style.backgroundImage = null;
    }*/


} 
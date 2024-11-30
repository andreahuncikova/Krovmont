// document.addEventListener('DOMContentLoaded', function () {
//     var modal = document.getElementById('imageModal');
//     var modalImage = document.getElementById('modalImage');
//     var closeModal = document.getElementById('closeModal');
//     var prevImage = document.getElementById('prevImage');
//     var nextImage = document.getElementById('nextImage');

//     var currentImageIndex = 0;
//     var imagesArray = [];
    
//     // Store all the image URLs in an array
//     document.querySelectorAll('.image-link').forEach(function (link) {
//         imagesArray.push(link.getAttribute('data-image'));
//     });

//     // Open modal when an image is clicked
//     document.querySelectorAll('.image-link').forEach(function (link, index) {
//         link.addEventListener('click', function (e) {
//             e.preventDefault();
//             currentImageIndex = index;
//             modal.style.display = "block";
//             modalImage.src = imagesArray[currentImageIndex];
//         });
//     });

//     // Close the modal
//     closeModal.onclick = function () {
//         modal.style.display = "none";
//     }

//     // Navigate to the previous image
//     prevImage.onclick = function () {
//         currentImageIndex = (currentImageIndex === 0) ? imagesArray.length - 1 : currentImageIndex - 1;
//         modalImage.src = imagesArray[currentImageIndex];
//     }

//     // Navigate to the next image
//     nextImage.onclick = function () {
//         currentImageIndex = (currentImageIndex === imagesArray.length - 1) ? 0 : currentImageIndex + 1;
//         modalImage.src = imagesArray[currentImageIndex];
//     }

//     // Navigate through images using arrow keys
//     document.addEventListener('keydown', function (e) {
//         if (modal.style.display === "block") {
//             if (e.key === 'ArrowLeft') {
//                 prevImage.click();
//             } else if (e.key === 'ArrowRight') {
//                 nextImage.click();
//             }
//         }
//     });
// });

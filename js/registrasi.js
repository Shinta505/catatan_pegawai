const togglePassword = document.querySelector("#togglePassword");
const passwordInput = document.querySelector("#inputPassword");
const eyeIcon = togglePassword.querySelector("i");

togglePassword.addEventListener("click", function () {
    // Toggle the type attribute
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Toggle icon class
    if (type === "password") {
        // Saat password disembunyikan, tampilkan ikon mata silang
        eyeIcon.classList.remove("lni", "lni-eye");
        eyeIcon.classList.add("bx", "bxs-low-vision");
    } else {
        // Saat password terlihat, tampilkan ikon mata
        eyeIcon.classList.remove("bx", "bxs-low-vision");
        eyeIcon.classList.add("lni", "lni-eye");
    }
});
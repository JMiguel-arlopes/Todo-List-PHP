const inputs = document.querySelectorAll(".input_text");
const labels = document.querySelectorAll(".label");

inputs.forEach((input) => {
  input.addEventListener("change", (e) => {
    console.log(e.target);
    const valueInput = e.target.value;
    const valueToLabelDefault = "";
    const label = e.target.nextElementSibling;

    return valueInput.trim() !== valueToLabelDefault
      ? label.classList.add("top_label")
      : label.classList.remove("top_label");
  });
});

labels.forEach((label) => {});

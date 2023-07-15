const educationTemplate = `
<div class="education">
<input type="text" name="education[]" value="Licence Degree at Boumerdes University"
    placeholder="Licence Degree at Boumerdes University">
<div>
    <input type="number" required name="education_start[]" min="1900" max="2099" step="1"
        placeholder="Start Year" />
    <input type="number" name="education_end[]" min="1900" max="2099" step="1"
        placeholder="End Year" />
</div>
</div>
`;

const workdeInTemplate = `
<div class="workedin">
            <input type="text" name="workedin[]" value="Curalinc Enterprise as a Wordpress Developer"
                placeholder="Curalinc Enterprise as a wordpress developer">
            <div>
                <input type="number" required name="workedin_start[]" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="workedin_end[]" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
</div>
`;

jQuery(".add_workedin").click(function () {
  if (jQuery(".workedin_container .workedin").length === 6) return;
  jQuery(".workedin_container").append(workdeInTemplate);
});

jQuery(".add_education").click(function () {
  if (jQuery(".education_container .education").length === 6) return;
  jQuery(".education_container").append(educationTemplate);
});

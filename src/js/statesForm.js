let states = [];
states_cities.forEach((state_city) => {
  if (!states.some((state) => state.wilaya_code === state_city.wilaya_code)) {
    states.push({
      wilaya_code: state_city.wilaya_code,
      wilaya_name: state_city.wilaya_name,
      wilaya_name_ascii: state_city.wilaya_name_ascii,
    });
  }
});

jQuery("select[name=state]").append(`
<option selected disabled value="">Wilaya</option>
`);
states.forEach((state) => {
  jQuery("select[name=state]").append(`
    <option value="${state.wilaya_name_ascii}">${state.wilaya_name_ascii}</option>
    `);
});

jQuery("select[name=city]").append(`
<option selected disabled value="">City</option>
`);

function get_cities(wilaya_name_ascii) {
  return states_cities.filter(
    (state_city) => state_city.wilaya_name_ascii === wilaya_name_ascii
  );
}

jQuery("select[name=state]").on("change", function () {
  cities = get_cities(jQuery(this).val());
  jQuery("select[name=city]").html("");
  jQuery("select[name=city]").append(`
  <option disabled selected value="">City</option>
  `);
  cities.forEach((city) => {
    jQuery("select[name=city]").append(`
      <option value="${city.commune_name_ascii}">${city.commune_name_ascii}</option>
      `);
  });
});

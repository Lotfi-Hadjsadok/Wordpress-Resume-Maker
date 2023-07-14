import { Configuration, OpenAIApi } from "openai";
import "./keys";
const configuration = new Configuration(config);
const openai = new OpenAIApi(configuration);

jQuery("#tools-tags").selectize({
  delimiter: ",",
  persist: false,
  create: function (input) {
    return {
      value: input,
      text: input,
    };
  },
});

jQuery("#skills-tags").selectize({
  delimiter: ",",
  persist: false,
  create: function (input) {
    return {
      value: input,
      text: input,
    };
  },
});

// jQuery(".resume_generate").on("click", async function (e) {
//   e.preventDefault();
//   jQuery(".resume_generate").val("Generating ...");
//   const name = jQuery("input[name=name]").val();
//   const email = jQuery("input[name=email]").val();
//   const phone = jQuery("input[name=phone]").val();
//   const skills = jQuery("input[name=skills]").val();
//   const workedin = jQuery("input[name=workedin]").val();
//   const yearsexp = jQuery("input[name=yearsexp]").val();
//   const tools = jQuery("input[name=tools]").val();
//   const lang = jQuery("select[name=lang]").val();

//   const response = await openai.createChatCompletion({
//     model: "gpt-3.5-turbo",
//     messages: [
//       {
//         role: "user",
//         content: `
//         A CV summary is a statement at the top of a CV that outlines a job candidate's professional experience, skills and background. It's typically a short and concise paragraph, around four to five sentences long, and it contains a candidate's most impressive, relevant qualifications.

//         name : ${name}
//         skills : ${skills}
//         years of experience : ${yearsexp}
//         Worked in : ${workedin}
//         tools used : ${tools}

//         write a short summary for a cv as first person
//         in ${lang} Please
//         `,
//       },
//     ],
//     max_tokens: 500,
//     top_p: 1,
//     frequency_penalty: 0,
//     presence_penalty: 0,
//   });

//   jQuery(".resume_data").html(response.data.choices[0].message.content);
//   jQuery(".resume_data").show();
//   jQuery(".resume_generate").val("Generate");
//   console.log(response);
// });

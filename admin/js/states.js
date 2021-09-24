fetch("./js/states.json")
  .then((res) => res.json())
  .then((states) => {
    for (const state in states) {
      document.getElementById("states").innerHTML += `<option>${states[state].name}</option>`;
      console.log(state);
    }
  });

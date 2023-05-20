import React from "react";
import "./Meme.css";
import memesData from "./memesData.js";

function Meme() {
  const [memeImage, setMemeImage] = React.useState("");

  function getMemeImage(e) {
    e.preventDefault();
    const memesArray = memesData["data"]["memes"];
    const randomNumber = Math.floor(Math.random() * memesArray.length);
    const { url } = memesArray[randomNumber];
    setMemeImage(url);
  }

  return (
    <main className="Meme">
      <form className="Meme__form">
        <input type="text" className="Meme__input" placeholder="Top text" />
        <input type="text" className="Meme__input" placeholder="Bottom text" />
        <button onClick={getMemeImage} className="Meme__button">
          Get a new meme image
        </button>
      </form>
      <img className="Meme__image" src={memeImage} />
    </main>
  );
}

export default Meme;

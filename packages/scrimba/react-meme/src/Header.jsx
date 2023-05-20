import "./Header.css";
import trollFace from "/assets/troll-face.png";

function Header() {
  return (
    <header className="Header">
      <img className="Header__image" src={trollFace} />
      <h1 className="Header__title">Meme Generator</h1>
      <h2 className="Header__subtitle">React Course - Project 3</h2>
    </header>
  );
}

export default Header;

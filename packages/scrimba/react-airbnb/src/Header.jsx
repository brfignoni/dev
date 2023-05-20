import airbnbLogo from "/assets/airbnb.png";
import "./Header.css";

export default function Header() {
  return (
    <header className="Header">
      <img className="Header__logo" src={airbnbLogo}></img>
    </header>
  );
}

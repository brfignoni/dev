import "./Header.css";
import worldLogo from "/assets/world-logo.png";

function Header(props) {
  return (
    <header className="Header">
      <img src={worldLogo} /> {props.title}
    </header>
  );
}

export default Header;

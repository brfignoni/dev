import "./Main.css";
import grid from "/assets/grid.png";

export default function CardMain() {
  return (
    <main className="Main">
      <img className="Main__grid" src={grid}></img>
      <h1 className="Main__title">Online Experiences</h1>
      <p className="Main__description">
        Join unique interactive activities led by one-of-a-kind hosts—all
        without leaving home.
      </p>
    </main>
  );
}

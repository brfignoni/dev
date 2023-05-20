import Header from "./Header";
import CardMain from "./CardMain";
import Slider from "./Slider";
import "./Card.css";

export default function Card() {
  return (
    <div className="Card">
      <Header />
      <CardMain />
      <Slider />
    </div>
  );
}

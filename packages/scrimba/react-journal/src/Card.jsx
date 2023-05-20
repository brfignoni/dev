import "./Card.css";
import Header from "./Header";
import List from "./List";

function Card() {
  return (
    <div className="Card">
      <Header title="my travel journal." />
      <List />
    </div>
  );
}

export default Card;

import "./Item.css";
import star from "/assets/star.png";

export default function Item(props) {
  console.log(props);
  return (
    <li className="Item">
      <div className="Item__image-container">
        {props.soldOut && <span className="Item__tag">sold out</span>}
        <img className="Item__image" src={props.imgSource}></img>
      </div>
      <div className="Item__data">
        <span className="Item__data-star">
          <img src={star}></img>
        </span>
        <span className="Item__data-score">{props.score}</span>
        <span className="Item__data-votes">{props.votes}</span>
        <span className="Item__data-country">{props.country}</span>
      </div>
      <p className="Item__description">{props.description}</p>
      <div className="Item__price">
        <strong>From $150</strong> / person
      </div>
    </li>
  );
}

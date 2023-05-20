import "./Slider.css";
import Item from "./item";
import itemsData from "./items.js";

export default function Slider() {
  const items = itemsData.map((item, index) => {
    return <Item key={index} {...item}></Item>;
  });
  return <ul className="Slider">{items}</ul>;
}

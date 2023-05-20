import "./List.css";
import locations from "./locations";
import Location from "./Location";

function List() {
  const locationsItems = locations.map((location) => {
    return <Location {...location} />;
  });
  return <ul className="List">{locationsItems}</ul>;
}

export default List;

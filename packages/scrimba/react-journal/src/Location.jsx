import "./Location.css";
import locationIcon from "/assets/location-icon.png";

function Location(props) {
  return (
    <li className="Location">
      <div className="Location__container">
        <div className="Location__container-left">
          <img src={props.imageUrl} />
        </div>
        <div className="Location__container-right">
          <header className="Location__header">
            <img className="Location__icon" src={locationIcon} />
            <span className="Location__country">{props.location}</span>
            <a
              href={props.googleMapsUrl}
              target="_blank"
              className="Location__gmaps"
            >
              View on Google Maps
            </a>
          </header>
          <h2>{props.title}</h2>
          <div className="Location__dates">
            <time datetime={props.startDate}>{props.startDate}</time> -
            <time datetime={props.endDate}>{props.endDate}</time>
          </div>
          <p className="Location__description">{props.description}</p>
        </div>
      </div>
    </li>
  );
}

export default Location;

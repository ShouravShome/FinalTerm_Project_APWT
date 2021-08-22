import { Link } from "react-router-dom"
const Navbar = () => {
	return (
		<div>
			<Link to="/home"> Home </Link> |
			<Link to="/order"> Order </Link>
			<Link to="/orderlist"> OrderList </Link>
			<Link to="/userlist"> User Information</Link>
		</div>
	);
};
export default Navbar;
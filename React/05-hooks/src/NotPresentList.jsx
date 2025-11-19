export function NotPresentList({ children}) {

    const styling = {
        gridColumn: 1,
        gridRow: 2,
        overflow: "auto",
        backgroundColor: "#3b1f1f",
        borderRadius: "1rem",
        border: "1px solid rgba(239,68,68,0.2)",
    }
    return (
        <div style={styling}>
            <h1>Not present</h1>
            <div className="not-present">
                { children }
            </div>
        </div>
    )
}
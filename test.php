<style>
    /* Styling for the overall diagram container */
    .architecture-diagram {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-color: #ffffff;
    }

    /* Styling for each architectural layer */
    .layer {
        border: 2px solid #333;
        margin: 15px 0;
        padding: 10px;
        width: 100%;
        max-width: 500px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Header styling for each layer */
    .layer h3 {
        margin-top: 0;
        padding-bottom: 5px;
        border-bottom: 1px solid #ddd;
        font-size: 1.1em;
        font-weight: bold;
    }

    /* Styling for the components (boxes) inside the layers */
    .component-box {
        background-color: #f0f0f0;
        border: 1px solid #999;
        padding: 10px;
        margin: 8px auto;
        border-radius: 4px;
        font-size: 0.9em;
    }

    /* Special styling for the database component */
    .database-box {
        background-color: #e0f7fa;
        border: 2px solid #00bcd4;
    }

    /* Styling for the flow annotations/arrows */
    .flow-annotation {
        margin: 8px 0;
        font-size: 0.9em;
        font-weight: bold;
        color: #007bff; /* Blue color for clear visibility */
    }

    /* Specific styling for data flow and response flow */
    .data-flow {
        color: #d9534f; /* Red for emphasis on data movement */
    }
</style>

<div class="architecture-diagram">

    <!-- Presentation Layer -->
    <div class="layer client-layer">
        <h3>Presentation Layer (Client)</h3>
        <div class="component-box">Applicant Browser</div>
        <div class="component-box">Admin / PDAO Browser</div>
        <div class="component-box">Doctor / CHO Browser</div>
    </div>

    <div class="flow-annotation">-- HTTP Request (A1, A2, A3) --></div>

    <!-- Application Layer -->
    <div class="layer application-layer">
        <h3>Application Layer: Docker/Apache/PHP</h3>
        <div class="component-box">Apache Web Server</div>
        <div class="flow-annotation">-- Routes Request --></div>
        <div class="component-box">PHP Application Logic</div>
    </div>

    <div class="flow-annotation data-flow">-- SQL Query --></div>

    <!-- Data Layer -->
    <div class="layer data-layer">
        <h3>Data Layer</h3>
        <div class="component-box database-box">(PostgreSQL Database)</div>
    </div>

    <div class="flow-annotation data-flow"><-- Results (Data) --</div>
    <div class="flow-annotation"><-- HTML / Page Response --</div>

</div>